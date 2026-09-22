<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | TAMBAH PRODUK KE KERANJANG
    |--------------------------------------------------------------------------
    */

    public function add(Product $product)
    {
        // Cek stok
        if ($product->stok <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'Produk sedang habis.'
            ], 422);
        }

        // Ambil cart dari session
        $cart = session()->get('cart', []);

        $productId = $product->product_id;

        // Kalau produk sudah ada di cart
        if (isset($cart[$productId])) {

            // Jangan melebihi stok
            if ($cart[$productId]['quantity'] >= $product->stok) {
                return response()->json([
                    'success' => false,
                    'message' => 'Jumlah produk sudah mencapai stok yang tersedia.'
                ], 422);
            }

            $cart[$productId]['quantity']++;
        }

        // Kalau produk belum ada
        else {

            $cart[$productId] = [
                'product_id' => $productId,
                'quantity' => 1,
            ];
        }

        // Simpan cart
        session()->put('cart', $cart);

        /*
        |--------------------------------------------------------------------------
        | HEADER = JUMLAH JENIS PRODUK
        |--------------------------------------------------------------------------
        | Contoh:
        | Rainbow x2 = 1
        | Rainbow x2 + Shape x3 = 2
        |--------------------------------------------------------------------------
        */

        $cartCount = count($cart);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan ke keranjang.',
            'cart_count' => $cartCount,
            'cart_badge' => min($cartCount, 99),
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | HALAMAN KERANJANG
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $cart = session()->get('cart', []);

        // Kalau cart kosong
        if (empty($cart)) {

            return view('user.shop.cart', [
                'cart' => [],
                'products' => collect(),
            ]);
        }

        // Ambil ID produk yang ada di cart
        $productIds = array_keys($cart);

        // Ambil data produk dari database
        $products = Product::whereIn('product_id', $productIds)
            ->get()
            ->keyBy('product_id');

        return view('user.shop.cart', compact(
            'cart',
            'products'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE JUMLAH PRODUK
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        if (!isset($cart[$productId])) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan di keranjang.'
            ], 404);
        }

        $product = Product::find($productId);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan.'
            ], 404);
        }

        $quantity = $request->quantity;

        // Jangan melebihi stok
        if ($quantity > $product->stok) {
            return response()->json([
                'success' => false,
                'message' => 'Jumlah melebihi stok yang tersedia.'
            ], 422);
        }

        $cart[$productId]['quantity'] = $quantity;

        session()->put('cart', $cart);

        /*
        |--------------------------------------------------------------------------
        | HITUNG SUBTOTAL PRODUK
        |--------------------------------------------------------------------------
        */

        $subtotal = $product->harga * $quantity;

        /*
        |--------------------------------------------------------------------------
        | HITUNG TOTAL SEMUA PRODUK
        |--------------------------------------------------------------------------
        */

        $total = 0;

        foreach ($cart as $id => $item) {

            $cartProduct = Product::find($id);

            if ($cartProduct) {
                $total += $cartProduct->harga * $item['quantity'];
            }
        }

        /*
        |--------------------------------------------------------------------------
        | HEADER = JUMLAH JENIS PRODUK
        |--------------------------------------------------------------------------
        */

        $cartCount = count($cart);

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
    | HAPUS PRODUK DARI KERANJANG
    |--------------------------------------------------------------------------
    */

    public function remove($productId)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$productId])) {

            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan di keranjang.'
            ], 404);
        }

        unset($cart[$productId]);

        session()->put('cart', $cart);

        /*
        |--------------------------------------------------------------------------
        | HEADER = JUMLAH JENIS PRODUK
        |--------------------------------------------------------------------------
        */

        $cartCount = count($cart);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus dari keranjang.',
            'cart_count' => $cartCount,
            'cart_badge' => min(
                $cartCount,
                99
            ),
        ]);
    }
}