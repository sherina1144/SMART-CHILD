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
        $cart = session()->get('cart', []);

        $cartKey = 'box_' . $box->box_id;

        if (isset($cart[$cartKey])) {

            $cart[$cartKey]['quantity']++;

        } else {

            $cart[$cartKey] = [
                'type' => 'box',
                'box_id' => $box->box_id,
                'quantity' => 1,
            ];
        }

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

            $box = SmartChildBox::find($item['box_id']);

            if (!$box) {
                return response()->json([
                    'success' => false,
                    'message' => 'Smart Child Box tidak ditemukan.'
                ], 404);
            }

            $cart[$cartKey]['quantity'] = $quantity;

            $subtotal = $box->harga * $quantity;
        }

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