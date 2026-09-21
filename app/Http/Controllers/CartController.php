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

    public function checkout()
    {
        $cart = session()->get('cart', []);

        // Kalau cart kosong, jangan boleh checkout
        if (empty($cart)) {
            return redirect()
                ->route('shop.cart')
                ->with('error', 'Keranjang masih kosong.');
        }

        // Ambil ID produk
        $productIds = array_keys($cart);

        // Ambil produk dari database
        $products = Product::whereIn('product_id', $productIds)
            ->get()
            ->keyBy('product_id');

        // Hitung total
        $total = 0;
        $totalQuantity = 0;

        foreach ($cart as $productId => $item) {

            if (isset($products[$productId])) {

                $product = $products[$productId];

                $quantity = $item['quantity'];

                $subtotal = $product->harga * $quantity;

                $total += $subtotal;

                $totalQuantity += $quantity;
            }
        }

        return view('user.shop.checkout', compact(
            'cart',
            'products',
            'total',
            'totalQuantity'
        ));
    }

    public function placeOrder(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI DATA CHECKOUT
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'nama_penerima' => 'required|string|max:150',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);


        /*
        |--------------------------------------------------------------------------
        | AMBIL CART
        |--------------------------------------------------------------------------
        */

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('shop.cart')
                ->with('error', 'Keranjang masih kosong.');
        }


        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA PRODUK
        |--------------------------------------------------------------------------
        */

        $productIds = array_keys($cart);

        $products = Product::whereIn('product_id', $productIds)
            ->get()
            ->keyBy('product_id');


        /*
        |--------------------------------------------------------------------------
        | HITUNG TOTAL
        |--------------------------------------------------------------------------
        */

        $total = 0;

        foreach ($cart as $productId => $item) {

            if (!isset($products[$productId])) {
                continue;
            }

            $product = $products[$productId];

            $quantity = $item['quantity'];

            // Cek stok sekali lagi
            if ($quantity > $product->stok) {
                return redirect()
                    ->back()
                    ->with('error', 'Stok produk ' . $product->nama_produk . ' tidak mencukupi.');
            }

            $total += $product->harga * $quantity;
        }


        /*
        |--------------------------------------------------------------------------
        | UPLOAD BUKTI PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        $buktiPembayaran = $request
            ->file('bukti_pembayaran')
            ->store('bukti-pembayaran', 'public');


        /*
        |--------------------------------------------------------------------------
        | SIMPAN ORDER
        |--------------------------------------------------------------------------
        */

        $order = \DB::table('orders')->insertGetId([
            'nomor_order' => 'SC-' . date('YmdHis') . rand(100, 999),

            // SEMENTARA UNTUK TESTING SEBELUM LOGIN SELESAI
            'user_id' => 1,

            'nama_penerima' => $request->nama_penerima,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,

            'bukti_pembayaran' => $buktiPembayaran,

            'payment_status' => 'Menunggu Verifikasi',

            'total_harga' => $total,

            'status_pesanan' => 'Menunggu Konfirmasi',

            'created_at' => now(),
            'updated_at' => now(),
        ]);


        /*
        |--------------------------------------------------------------------------
        | SIMPAN DETAIL PRODUK ORDER
        |--------------------------------------------------------------------------
        */

        foreach ($cart as $productId => $item) {

            if (!isset($products[$productId])) {
                continue;
            }

            $product = $products[$productId];

            $quantity = $item['quantity'];

            $subtotal = $product->harga * $quantity;

            \DB::table('order_items')->insert([
                'order_id' => $order,

                'product_id' => $productId,

                'jumlah' => $quantity,

                'subtotal' => $subtotal,
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | KOSONGKAN CART
        |--------------------------------------------------------------------------
        */

        session()->forget('cart');


        /*
        |--------------------------------------------------------------------------
        | KEMBALI
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('shop.cart')
            ->with(
                'success',
                'Pesanan berhasil dikirim. Nomor pesanan: ' .
                \DB::table('orders')
                    ->where('order_id', $order)
                    ->value('nomor_order')
            );
    }

    public function myOrders()
    {
        // SEMENTARA sebelum login selesai
        // menggunakan user_id = 1 untuk testing
        $userId = 1;

        $orders = \DB::table('orders')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        $orderIds = $orders->pluck('order_id');

        $orderItems = \DB::table('order_items')
            ->whereIn('order_id', $orderIds)
            ->get()
            ->groupBy('order_id');

        $products = Product::whereIn(
            'product_id',
            $orderItems
                ->flatten()
                ->pluck('product_id')
                ->unique()
        )
        ->get()
        ->keyBy('product_id');

        return view('user.shop.my_orders', compact(
            'orders',
            'orderItems',
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