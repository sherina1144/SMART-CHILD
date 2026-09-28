<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SmartChildBox;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Tambah Produk Biasa ke Keranjang
    |--------------------------------------------------------------------------
    */

    public function add(Product $product)
    {
        if ($product->stok <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'Produk sedang habis.'
            ], 422);
        }

        $cart = session()->get('cart', []);

        $cartKey = 'product_' . $product->product_id;

        if (isset($cart[$cartKey])) {

            if ($cart[$cartKey]['quantity'] >= $product->stok) {
                return response()->json([
                    'success' => false,
                    'message' => 'Jumlah produk sudah mencapai stok yang tersedia.'
                ], 422);
            }

            $cart[$cartKey]['quantity']++;

        } else {

            $cart[$cartKey] = [
                'type' => 'product',
                'product_id' => $product->product_id,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

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
        /*
        |--------------------------------------------------------------------------
        | Cek stok isi Smart Child Box
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


        /*
        |--------------------------------------------------------------------------
        | Ambil Cart
        |--------------------------------------------------------------------------
        */

        $cart = session()->get('cart', []);

        $cartKey = 'box_' . $box->box_id;


        /*
        |--------------------------------------------------------------------------
        | Kalau Box sudah ada di Cart
        |--------------------------------------------------------------------------
        */

        if (isset($cart[$cartKey])) {

            $currentQuantity = $cart[$cartKey]['quantity'];

            /*
            | Jangan boleh melebihi stok Box
            */

            if ($currentQuantity >= $boxStock) {
                return response()->json([
                    'success' => false,
                    'message' => 'Jumlah Smart Child Box sudah mencapai stok yang tersedia.'
                ], 422);
            }

            $cart[$cartKey]['quantity']++;

        } else {

            /*
            |--------------------------------------------------------------------------
            | Tambahkan Box Baru
            |--------------------------------------------------------------------------
            */

            $cart[$cartKey] = [
                'type' => 'box',
                'box_id' => $box->box_id,
                'quantity' => 1,
            ];
        }


        /*
        |--------------------------------------------------------------------------
        | Simpan Cart
        |--------------------------------------------------------------------------
        */

        session()->put('cart', $cart);

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
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return view('user.shop.cart', [
                'cart' => [],
                'products' => collect(),
                'boxes' => collect(),
            ]);
        }

        $productIds = [];
        $boxIds = [];

        foreach ($cart as $item) {

            if (($item['type'] ?? 'product') === 'box') {
                $boxIds[] = $item['box_id'];
            } else {
                $productIds[] = $item['product_id'];
            }
        }

        $products = Product::whereIn('product_id', $productIds)
            ->get()
            ->keyBy('product_id');

        $boxes = SmartChildBox::whereIn('box_id', $boxIds)
            ->get()
            ->keyBy('box_id');

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
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        if (!isset($cart[$cartKey])) {
            return response()->json([
                'success' => false,
                'message' => 'Item tidak ditemukan di keranjang.'
            ], 404);
        }

        $item = $cart[$cartKey];

        $quantity = (int) $request->quantity;


        /*
        |--------------------------------------------------------------------------
        | Produk Biasa
        |--------------------------------------------------------------------------
        */

        if (($item['type'] ?? 'product') === 'product') {

            $product = Product::find($item['product_id']);

            if (!$product) {
                return response()->json([
                    'success' => false,
                    'message' => 'Produk tidak ditemukan.'
                ], 404);
            }

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

            $cart[$cartKey]['quantity'] = $quantity;

            $subtotal = $product->harga * $quantity;
        }


        /*
        |--------------------------------------------------------------------------
        | Smart Child Box
        |--------------------------------------------------------------------------
        */

        else {

            $box = SmartChildBox::with('items.product')
                ->find($item['box_id']);

            if (!$box) {
                return response()->json([
                    'success' => false,
                    'message' => 'Smart Child Box tidak ditemukan.'
                ], 404);
            }


            /*
            |--------------------------------------------------------------------------
            | Cek stok Box
            |--------------------------------------------------------------------------
            */

            $boxStock = $this->getBoxStock($box);

            if ($boxStock <= 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Smart Child Box sedang habis.'
                ], 422);
            }


            /*
            |--------------------------------------------------------------------------
            | Cek jumlah Box
            |--------------------------------------------------------------------------
            */

            if ($quantity > $boxStock) {
                return response()->json([
                    'success' => false,
                    'message' => 'Jumlah Smart Child Box melebihi stok yang tersedia.'
                ], 422);
            }


            /*
            |--------------------------------------------------------------------------
            | Update Quantity
            |--------------------------------------------------------------------------
            */

            $cart[$cartKey]['quantity'] = $quantity;

            $subtotal = $box->harga * $quantity;
        }


        /*
        |--------------------------------------------------------------------------
        | Simpan Cart
        |--------------------------------------------------------------------------
        */

        session()->put('cart', $cart);


        /*
        |--------------------------------------------------------------------------
        | Hitung Total
        |--------------------------------------------------------------------------
        */

        $total = 0;

        foreach ($cart as $key => $cartItem) {

            if (($cartItem['type'] ?? 'product') === 'box') {

                $box = SmartChildBox::find($cartItem['box_id']);

                if ($box) {
                    $total += $box->harga * $cartItem['quantity'];
                }

            } else {

                $product = Product::find($cartItem['product_id']);

                if ($product) {
                    $total += $product->harga * $cartItem['quantity'];
                }
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Cart Count
        |--------------------------------------------------------------------------
        */

        $cartCount = $this->getCartCount($cart);


        /*
        |--------------------------------------------------------------------------
        | Response
        |--------------------------------------------------------------------------
        */

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
        $cart = session()->get('cart', []);

        if (!isset($cart[$cartKey])) {
            return response()->json([
                'success' => false,
                'message' => 'Item tidak ditemukan di keranjang.'
            ], 404);
        }

        unset($cart[$cartKey]);

        session()->put('cart', $cart);

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
    | Hitung Stok Smart Child Box
    |--------------------------------------------------------------------------
    |
    | Stok Box ditentukan oleh produk dengan stok paling sedikit.
    |
    | Contoh:
    |
    | Produk A = 20, kebutuhan 1
    | Produk B = 15, kebutuhan 1
    | Produk C = 25, kebutuhan 1
    |
    | Maka stok Box = 15.
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
            | Ambil stok paling kecil
            |--------------------------------------------------------------------------
            */

            if ($boxStock === null || $available < $boxStock) {
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