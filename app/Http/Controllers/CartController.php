<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
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

            // Cek supaya jumlah tidak melebihi stok
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

        // Simpan kembali ke session
        session()->put('cart', $cart);

        // JUMLAH JENIS PRODUK
        $cartCount = count($cart);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan ke keranjang.',
            'cart_count' => $cartCount,
            'cart_badge' => min($cartCount, 99),
        ]);
    }


    public function index()
    {
        $cart = session()->get('cart', []);

        return view('user.shop.cart', compact('cart'));
    }
}