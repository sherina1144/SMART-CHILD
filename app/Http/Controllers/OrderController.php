<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CHECKOUT
    |--------------------------------------------------------------------------
    */

    public function checkout()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('shop.cart')
                ->with('error', 'Keranjang masih kosong.');
        }

        $products = Product::whereIn(
            'product_id',
            array_keys($cart)
        )->get()->keyBy('product_id');

        $total = 0;
        $totalQuantity = 0;

        foreach ($cart as $productId => $item) {

            if (!isset($products[$productId])) {
                continue;
            }

            $product = $products[$productId];

            $quantity = $item['quantity'];

            /*
            Cek stok saat checkout.
            Stok belum dikurangi di sini.
            */

            if ($quantity > $product->stok) {

                return redirect()
                    ->route('shop.cart')
                    ->with(
                        'error',
                        'Stok ' . $product->nama_produk . ' tidak mencukupi.'
                    );
            }

            $total += $product->harga * $quantity;
            $totalQuantity += $quantity;
        }

        return view(
            'user.shop.checkout',
            compact(
                'cart',
                'products',
                'total',
                'totalQuantity'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | SIMPAN ORDER
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'nama_penerima' => 'required|string|max:150',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',

            'metode_pembayaran' => [
                'required',
                'in:GoPay,DANA,OVO,ShopeePay,QRIS,Mandiri,BCA,BRI,BNI,BSI',
            ],
        ], [
            'nama_penerima.required' =>
                'Nama penerima wajib diisi.',

            'no_hp.required' =>
                'Nomor HP wajib diisi.',

            'alamat.required' =>
                'Alamat wajib diisi.',

            'metode_pembayaran.required' =>
                'Metode pembayaran wajib dipilih.',

            'metode_pembayaran.in' =>
                'Metode pembayaran tidak valid.',
        ]);

        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('shop.cart')
                ->with('error', 'Keranjang masih kosong.');
        }

        $metodePembayaran =
        $request->metode_pembayaran === 'Bank'
            ? $request->bank_pilihan
            : $request->metode_pembayaran;

        DB::beginTransaction();

        try {

            $products = Product::whereIn(
                'product_id',
                array_keys($cart)
            )
            ->lockForUpdate()
            ->get()
            ->keyBy('product_id');

            $total = 0;

            /*
            Cek ulang stok sebelum membuat order.
            */

            foreach ($cart as $productId => $item) {

                if (!isset($products[$productId])) {
                    throw new \Exception(
                        'Produk tidak ditemukan.'
                    );
                }

                $product = $products[$productId];

                $quantity = (int) $item['quantity'];

                if ($quantity <= 0) {
                    throw new \Exception(
                        'Jumlah produk tidak valid.'
                    );
                }

                if ($quantity > $product->stok) {
                    throw new \Exception(
                        'Stok ' . $product->nama_produk .
                        ' tidak mencukupi.'
                    );
                }

                $total +=
                    $product->harga * $quantity;
            }


            /*
            BUAT ORDER
            */

            $order = Order::create([
                'nomor_order' =>
                    'SC-' .
                    date('YmdHis') .
                    '-' .
                    Auth::id(),

                'user_id' =>
                    Auth::id(),

                'nama_penerima' =>
                    $request->nama_penerima,

                'no_hp' =>
                    $request->no_hp,

                'alamat' =>
                    $request->alamat,

                'metode_pembayaran' =>
                    $request->metode_pembayaran,

                'payment_status' =>
                    'Menunggu Konfirmasi',

                'total_harga' =>
                    $total,

                'status_pesanan' =>
                    'Pending',
            ]);


            /*
            BUAT ORDER ITEMS
            */

            foreach ($cart as $productId => $item) {

                $product =
                    $products[$productId];

                $quantity =
                    (int) $item['quantity'];

                $subtotal =
                    $product->harga * $quantity;

                OrderItem::create([
                    'order_id' =>
                        $order->order_id,

                    'product_id' =>
                        $product->product_id,

                    'jumlah' =>
                        $quantity,

                    'subtotal' =>
                        $subtotal,
                ]);
            }


            /*
            KOSONGKAN CART
            */

            session()->forget('cart');

            DB::commit();

            return redirect()
            ->route('shop.allproducts')
            ->with(
                'success',
                'Pesanan berhasil dibuat.'
            );

        } catch (\Exception $e) {

            DB::rollBack();

            throw $e;
        }
    }


    /*
    |--------------------------------------------------------------------------
    | MY ORDER
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $orders = Order::with('items.product')
            ->where(
                'user_id',
                Auth::id()
            )
            ->latest('created_at')
            ->get();

        return view(
            'user.shop.my_orders',
            compact('orders')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DETAIL ORDER
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $order = Order::with('items.product')
            ->where('user_id', Auth::id())
            ->where('order_id', $id)
            ->firstOrFail();

        return view(
            'user.shop.order_detail',
            compact('order')
        );
    }
}