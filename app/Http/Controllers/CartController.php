<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SmartChildBox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Tambah Produk Biasa ke Keranjang
    |--------------------------------------------------------------------------
    */

    public function add(Product $product)
    {
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Silakan login terlebih dahulu.'
            ], 401);
        }

        if ($product->stok <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'Produk sedang habis.'
            ], 422);
        }

        $userId = auth()->id();

        /*
        |--------------------------------------------------------------------------
        | Cari Produk di Cart User
        |--------------------------------------------------------------------------
        */

        $cartItem = DB::table('cart_items')
            ->where('user_id', $userId)
            ->where('product_id', $product->product_id)
            ->whereNull('box_id')
            ->first();

        /*
        |--------------------------------------------------------------------------
        | Kalau Produk Sudah Ada
        |--------------------------------------------------------------------------
        */

        if ($cartItem) {

            if ($cartItem->quantity >= $product->stok) {
                return response()->json([
                    'success' => false,
                    'message' => 'Jumlah produk sudah mencapai stok yang tersedia.'
                ], 422);
            }

            DB::table('cart_items')
                ->where('cart_item_id', $cartItem->cart_item_id)
                ->update([
                    'quantity' => $cartItem->quantity + 1,
                    'updated_at' => now(),
                ]);

        } else {

            /*
            |--------------------------------------------------------------------------
            | Tambahkan Produk Baru
            |--------------------------------------------------------------------------
            */

            DB::table('cart_items')->insert([
                'user_id' => $userId,
                'product_id' => $product->product_id,
                'box_id' => null,
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Sinkronkan Database ke Session
        |--------------------------------------------------------------------------
        */

        $cart = $this->syncCartToSession();

        $cartCount = $this->getCartCount($cart);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan ke keranjang.',
            'cart_count' => $cartCount,
            'cart_badge' => min($cartCount, 99),
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | Tambah Smart Child Box ke Keranjang
    |--------------------------------------------------------------------------
    */

    public function addBox(SmartChildBox $box)
    {
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Silakan login terlebih dahulu.'
            ], 401);
        }

        /*
        |--------------------------------------------------------------------------
        | Cek Stok Isi Smart Child Box
        |--------------------------------------------------------------------------
        */

        $box->load('items.product');

        $boxStock = $this->getBoxStock($box);

        if ($boxStock <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'Smart Child Box sedang habis.'
            ], 422);
        }

        $userId = auth()->id();

        /*
        |--------------------------------------------------------------------------
        | Cari Box di Cart User
        |--------------------------------------------------------------------------
        */

        $cartItem = DB::table('cart_items')
            ->where('user_id', $userId)
            ->where('box_id', $box->box_id)
            ->whereNull('product_id')
            ->first();

        /*
        |--------------------------------------------------------------------------
        | Kalau Box Sudah Ada
        |--------------------------------------------------------------------------
        */

        if ($cartItem) {

            if ($cartItem->quantity >= $boxStock) {
                return response()->json([
                    'success' => false,
                    'message' => 'Jumlah Smart Child Box sudah mencapai stok yang tersedia.'
                ], 422);
            }

            DB::table('cart_items')
                ->where('cart_item_id', $cartItem->cart_item_id)
                ->update([
                    'quantity' => $cartItem->quantity + 1,
                    'updated_at' => now(),
                ]);

        } else {

            /*
            |--------------------------------------------------------------------------
            | Tambahkan Box Baru
            |--------------------------------------------------------------------------
            */

            DB::table('cart_items')->insert([
                'user_id' => $userId,
                'product_id' => null,
                'box_id' => $box->box_id,
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Sinkronkan Database ke Session
        |--------------------------------------------------------------------------
        */

        $cart = $this->syncCartToSession();

        $cartCount = $this->getCartCount($cart);

        return response()->json([
            'success' => true,
            'message' => $box->nama_box . ' berhasil ditambahkan ke keranjang.',
            'cart_count' => $cartCount,
            'cart_badge' => min($cartCount, 99),
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | Menampilkan Keranjang
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        /*
        |--------------------------------------------------------------------------
        | Ambil Cart dari Database
        |--------------------------------------------------------------------------
        */

        $cart = $this->syncCartToSession();

        if (empty($cart)) {
            return view('user.shop.cart', [
                'cart' => [],
                'products' => collect(),
                'boxes' => collect(),
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Pisahkan Product ID dan Box ID
        |--------------------------------------------------------------------------
        */

        $productIds = [];
        $boxIds = [];

        foreach ($cart as $item) {

            if (($item['type'] ?? 'product') === 'box') {
                $boxIds[] = $item['box_id'];
            } else {
                $productIds[] = $item['product_id'];
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Ambil Produk
        |--------------------------------------------------------------------------
        */

        $products = collect();

        if (!empty($productIds)) {
            $products = Product::whereIn('product_id', $productIds)
                ->get()
                ->keyBy('product_id');
        }

        /*
        |--------------------------------------------------------------------------
        | Ambil Smart Child Box
        |--------------------------------------------------------------------------
        */

        $boxes = collect();

        if (!empty($boxIds)) {
            $boxes = SmartChildBox::whereIn('box_id', $boxIds)
                ->get()
                ->keyBy('box_id');
        }

        return view('user.shop.cart', compact(
            'cart',
            'products',
            'boxes'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | Update Jumlah Produk / Box
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $cartKey)
    {
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Silakan login terlebih dahulu.'
            ], 401);
        }

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $userId = auth()->id();

        $quantity = (int) $request->quantity;

        /*
        |--------------------------------------------------------------------------
        | Tentukan Jenis Cart
        |--------------------------------------------------------------------------
        */

        if (str_starts_with($cartKey, 'product_')) {

            $productId = (int) str_replace('product_', '', $cartKey);

            /*
            |--------------------------------------------------------------------------
            | Ambil Produk
            |--------------------------------------------------------------------------
            */

            $product = Product::find($productId);

            if (!$product) {
                return response()->json([
                    'success' => false,
                    'message' => 'Produk tidak ditemukan.'
                ], 404);
            }

            /*
            |--------------------------------------------------------------------------
            | Cek Stok Produk
            |--------------------------------------------------------------------------
            */

            if ($product->stok <= 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Produk sedang habis.'
                ], 422);
            }

            if ($quantity > $product->stok) {
                return response()->json([
                    'success' => false,
                    'message' => 'Jumlah melebihi stok yang tersedia.'
                ], 422);
            }

            /*
            |--------------------------------------------------------------------------
            | Cari Cart Item
            |--------------------------------------------------------------------------
            */

            $cartItem = DB::table('cart_items')
                ->where('user_id', $userId)
                ->where('product_id', $productId)
                ->whereNull('box_id')
                ->first();

            if (!$cartItem) {
                return response()->json([
                    'success' => false,
                    'message' => 'Item tidak ditemukan di keranjang.'
                ], 404);
            }

            /*
            |--------------------------------------------------------------------------
            | Update Quantity
            |--------------------------------------------------------------------------
            */

            DB::table('cart_items')
                ->where('cart_item_id', $cartItem->cart_item_id)
                ->update([
                    'quantity' => $quantity,
                    'updated_at' => now(),
                ]);

            $subtotal = $product->harga * $quantity;

        } elseif (str_starts_with($cartKey, 'box_')) {

            $boxId = (int) str_replace('box_', '', $cartKey);

            /*
            |--------------------------------------------------------------------------
            | Ambil Smart Child Box
            |--------------------------------------------------------------------------
            */

            $box = SmartChildBox::with('items.product')
                ->find($boxId);

            if (!$box) {
                return response()->json([
                    'success' => false,
                    'message' => 'Smart Child Box tidak ditemukan.'
                ], 404);
            }

            /*
            |--------------------------------------------------------------------------
            | Cek Stok Box
            |--------------------------------------------------------------------------
            */

            $boxStock = $this->getBoxStock($box);

            if ($boxStock <= 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Smart Child Box sedang habis.'
                ], 422);
            }

            if ($quantity > $boxStock) {
                return response()->json([
                    'success' => false,
                    'message' => 'Jumlah Smart Child Box melebihi stok yang tersedia.'
                ], 422);
            }

            /*
            |--------------------------------------------------------------------------
            | Cari Cart Item
            |--------------------------------------------------------------------------
            */

            $cartItem = DB::table('cart_items')
                ->where('user_id', $userId)
                ->where('box_id', $boxId)
                ->whereNull('product_id')
                ->first();

            if (!$cartItem) {
                return response()->json([
                    'success' => false,
                    'message' => 'Item tidak ditemukan di keranjang.'
                ], 404);
            }

            /*
            |--------------------------------------------------------------------------
            | Update Quantity
            |--------------------------------------------------------------------------
            */

            DB::table('cart_items')
                ->where('cart_item_id', $cartItem->cart_item_id)
                ->update([
                    'quantity' => $quantity,
                    'updated_at' => now(),
                ]);

            $subtotal = $box->harga * $quantity;

        } else {

            return response()->json([
                'success' => false,
                'message' => 'Format item keranjang tidak valid.'
            ], 400);
        }

        /*
        |--------------------------------------------------------------------------
        | Sinkronkan Database ke Session
        |--------------------------------------------------------------------------
        */

        $cart = $this->syncCartToSession();

        /*
        |--------------------------------------------------------------------------
        | Hitung Total
        |--------------------------------------------------------------------------
        */

        $total = $this->getCartTotal($cart);

        $cartCount = $this->getCartCount($cart);

        return response()->json([
            'success' => true,

            'quantity' => $quantity,

            'subtotal' => $subtotal,

            'subtotal_formatted' =>
                'Rp ' . number_format(
                    $subtotal,
                    0,
                    ',',
                    '.'
                ),

            'total' => $total,

            'total_formatted' =>
                'Rp ' . number_format(
                    $total,
                    0,
                    ',',
                    '.'
                ),

            'cart_count' => $cartCount,

            'cart_badge' => min(
                $cartCount,
                99
            ),
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | Hapus Item dari Keranjang
    |--------------------------------------------------------------------------
    */

    public function remove($cartKey)
    {
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Silakan login terlebih dahulu.'
            ], 401);
        }

        $userId = auth()->id();

        /*
        |--------------------------------------------------------------------------
        | Hapus Produk
        |--------------------------------------------------------------------------
        */

        if (str_starts_with($cartKey, 'product_')) {

            $productId = (int) str_replace('product_', '', $cartKey);

            $deleted = DB::table('cart_items')
                ->where('user_id', $userId)
                ->where('product_id', $productId)
                ->whereNull('box_id')
                ->delete();

        }

        /*
        |--------------------------------------------------------------------------
        | Hapus Smart Child Box
        |--------------------------------------------------------------------------
        */

        elseif (str_starts_with($cartKey, 'box_')) {

            $boxId = (int) str_replace('box_', '', $cartKey);

            $deleted = DB::table('cart_items')
                ->where('user_id', $userId)
                ->where('box_id', $boxId)
                ->whereNull('product_id')
                ->delete();

        }

        else {

            return response()->json([
                'success' => false,
                'message' => 'Format item keranjang tidak valid.'
            ], 400);
        }

        if ($deleted === 0) {
            return response()->json([
                'success' => false,
                'message' => 'Item tidak ditemukan di keranjang.'
            ], 404);
        }

        /*
        |--------------------------------------------------------------------------
        | Sinkronkan Database ke Session
        |--------------------------------------------------------------------------
        */

        $cart = $this->syncCartToSession();

        $cartCount = $this->getCartCount($cart);

        return response()->json([
            'success' => true,
            'message' => 'Item berhasil dihapus dari keranjang.',
            'cart_count' => $cartCount,
            'cart_badge' => min($cartCount, 99),
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | Sinkronkan Cart Database ke Session
    |--------------------------------------------------------------------------
    |
    | Database = penyimpanan utama
    | Session   = salinan untuk kebutuhan halaman/cart/checkout
    |
    */

    private function syncCartToSession()
    {
        if (!auth()->check()) {
            session()->forget('cart');

            return [];
        }

        $userId = auth()->id();

        /*
        |--------------------------------------------------------------------------
        | Ambil Semua Cart User
        |--------------------------------------------------------------------------
        */

        $cartItems = DB::table('cart_items')
            ->where('user_id', $userId)
            ->get();

        $cart = [];

        foreach ($cartItems as $item) {

            /*
            |--------------------------------------------------------------------------
            | Produk Biasa
            |--------------------------------------------------------------------------
            */

            if (!is_null($item->product_id)) {

                $cartKey = 'product_' . $item->product_id;

                $cart[$cartKey] = [
                    'type' => 'product',
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                ];

            }

            /*
            |--------------------------------------------------------------------------
            | Smart Child Box
            |--------------------------------------------------------------------------
            */

            elseif (!is_null($item->box_id)) {

                $cartKey = 'box_' . $item->box_id;

                $cart[$cartKey] = [
                    'type' => 'box',
                    'box_id' => $item->box_id,
                    'quantity' => $item->quantity,
                ];
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Simpan ke Session
        |--------------------------------------------------------------------------
        */

        session()->put('cart', $cart);

        return $cart;
    }


    /*
    |--------------------------------------------------------------------------
    | Hitung Total Harga Cart
    |--------------------------------------------------------------------------
    */

    private function getCartTotal($cart)
    {
        $total = 0;

        foreach ($cart as $cartItem) {

            /*
            |--------------------------------------------------------------------------
            | Smart Child Box
            |--------------------------------------------------------------------------
            */

            if (($cartItem['type'] ?? 'product') === 'box') {

                $box = SmartChildBox::find($cartItem['box_id']);

                if ($box) {
                    $total +=
                        $box->harga *
                        $cartItem['quantity'];
                }

            }

            /*
            |--------------------------------------------------------------------------
            | Produk Biasa
            |--------------------------------------------------------------------------
            */

            else {

                $product = Product::find(
                    $cartItem['product_id']
                );

                if ($product) {
                    $total +=
                        $product->harga *
                        $cartItem['quantity'];
                }
            }
        }

        return $total;
    }


    /*
    |--------------------------------------------------------------------------
    | Hitung Stok Smart Child Box
    |--------------------------------------------------------------------------
    |
    | Stok Box ditentukan oleh produk dengan stok paling sedikit.
    |
    */

    private function getBoxStock(SmartChildBox $box)
    {
        $boxStock = null;

        if ($box->items->count() === 0) {
            return 0;
        }

        foreach ($box->items as $item) {

            /*
            |--------------------------------------------------------------------------
            | Produk tidak ditemukan
            |--------------------------------------------------------------------------
            */

            if (!$item->product) {
                return 0;
            }

            /*
            |--------------------------------------------------------------------------
            | Stok Produk
            |--------------------------------------------------------------------------
            */

            $productStock = (int) $item->product->stok;

            /*
            |--------------------------------------------------------------------------
            | Jumlah Produk yang Dibutuhkan untuk 1 Box
            |--------------------------------------------------------------------------
            */

            $requiredQuantity = max(
                1,
                (int) $item->jumlah
            );

            /*
            |--------------------------------------------------------------------------
            | Hitung Berapa Box yang Bisa Dibuat
            |--------------------------------------------------------------------------
            */

            $available = intdiv(
                $productStock,
                $requiredQuantity
            );

            /*
            |--------------------------------------------------------------------------
            | Ambil Stok Paling Kecil
            |--------------------------------------------------------------------------
            */

            if (
                $boxStock === null ||
                $available < $boxStock
            ) {
                $boxStock = $available;
            }
        }

        return max(0, $boxStock);
    }


    /*
    |--------------------------------------------------------------------------
    | Hitung Jumlah Item Keranjang
    |--------------------------------------------------------------------------
    */

    private function getCartCount($cart)
    {
        $count = 0;

        foreach ($cart as $item) {
            $count += $item['quantity'] ?? 0;
        }

        return $count;
    }
}