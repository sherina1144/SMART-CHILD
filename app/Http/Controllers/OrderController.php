<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\SmartChildBox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | USER - CHECKOUT
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

        $total = 0;
        $totalQuantity = 0;

        foreach ($cart as $item) {

            $quantity = (int) ($item['quantity'] ?? 0);

            if ($quantity <= 0) {
                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | SMART CHILD BOX
            |--------------------------------------------------------------------------
            */

            if (($item['type'] ?? 'product') === 'box') {

                if (!isset($boxes[$item['box_id']])) {
                    continue;
                }

                $box = $boxes[$item['box_id']];

                if ($box->harga === null) {
                    continue;
                }

                $total += $box->harga * $quantity;
                $totalQuantity += $quantity;

                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | PRODUCT BIASA
            |--------------------------------------------------------------------------
            */

            if (!isset($products[$item['product_id']])) {
                continue;
            }

            $product = $products[$item['product_id']];

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
                'boxes',
                'total',
                'totalQuantity'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | USER - SIMPAN PESANAN
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


        /*
        |--------------------------------------------------------------------------
        | AMBIL CART DARI SESSION
        |--------------------------------------------------------------------------
        */

        $cart = session('cart', []);


        if (empty($cart)) {

            return redirect()
                ->route('shop.cart')
                ->with(
                    'error',
                    'Keranjang masih kosong.'
                );
        }


        DB::beginTransaction();


        try {

            $productIds = [];
            $boxIds = [];


            /*
            |--------------------------------------------------------------------------
            | PISAHKAN PRODUCT DAN BOX
            |--------------------------------------------------------------------------
            */

            foreach ($cart as $item) {

                if (
                    ($item['type'] ?? 'product') === 'box'
                ) {

                    $boxIds[] = $item['box_id'];

                } else {

                    $productIds[] = $item['product_id'];
                }
            }


            /*
            |--------------------------------------------------------------------------
            | AMBIL PRODUCT
            |--------------------------------------------------------------------------
            */

            $products = Product::whereIn(
                'product_id',
                $productIds
            )
                ->lockForUpdate()
                ->get()
                ->keyBy('product_id');


            /*
            |--------------------------------------------------------------------------
            | AMBIL SMART CHILD BOX
            |--------------------------------------------------------------------------
            */

            $boxes = SmartChildBox::whereIn(
                'box_id',
                $boxIds
            )
                ->lockForUpdate()
                ->get()
                ->keyBy('box_id');


            $total = 0;


            /*
            |--------------------------------------------------------------------------
            | CEK ISI CART
            |--------------------------------------------------------------------------
            */

            foreach ($cart as $item) {

                $quantity = (int) (
                    $item['quantity'] ?? 0
                );


                if ($quantity <= 0) {

                    throw new \Exception(
                        'Jumlah produk tidak valid.'
                    );
                }


                /*
                |--------------------------------------------------------------------------
                | SMART CHILD BOX
                |--------------------------------------------------------------------------
                */

                if (
                    ($item['type'] ?? 'product') === 'box'
                ) {

                    if (
                        !isset(
                            $boxes[$item['box_id']]
                        )
                    ) {

                        throw new \Exception(
                            'Smart Child Box tidak ditemukan.'
                        );
                    }


                    $box = $boxes[
                        $item['box_id']
                    ];


                    if ($box->harga === null) {

                        throw new \Exception(
                            'Smart Child Box belum memiliki harga.'
                        );
                    }


                    $total +=
                        $box->harga *
                        $quantity;


                    continue;
                }


                /*
                |--------------------------------------------------------------------------
                | PRODUCT BIASA
                |--------------------------------------------------------------------------
                */

                if (
                    !isset(
                        $products[
                            $item['product_id']
                        ]
                    )
                ) {

                    throw new \Exception(
                        'Produk tidak ditemukan.'
                    );
                }


                $product = $products[
                    $item['product_id']
                ];


                if (
                    $quantity >
                    $product->stok
                ) {

                    throw new \Exception(
                        'Stok ' .
                        $product->nama_produk .
                        ' tidak mencukupi.'
                    );
                }


                $total +=
                    $product->harga *
                    $quantity;
            }


            /*
            |--------------------------------------------------------------------------
            | BUAT ORDER
            |--------------------------------------------------------------------------
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

                /*
                | Pembayaran menunggu konfirmasi admin
                */

                'payment_status' =>
                    'Menunggu Konfirmasi',

                'total_harga' =>
                    $total,

                /*
                | Pesanan menunggu ACC admin
                */

                'status_pesanan' =>
                    'Pending',
            ]);


            /*
            |--------------------------------------------------------------------------
            | SIMPAN ORDER ITEM
            |--------------------------------------------------------------------------
            */

            foreach ($cart as $item) {

                $quantity = (int) (
                    $item['quantity'] ?? 0
                );


                /*
                |--------------------------------------------------------------------------
                | SMART CHILD BOX
                |--------------------------------------------------------------------------
                */

                if (
                    ($item['type'] ?? 'product') === 'box'
                ) {

                    $box = $boxes[
                        $item['box_id']
                    ];


                    $subtotal =
                        $box->harga *
                        $quantity;


                    OrderItem::create([

                        'order_id' =>
                            $order->order_id,

                        'product_id' =>
                            null,

                        'box_id' =>
                            $box->box_id,

                        'jumlah' =>
                            $quantity,

                        'subtotal' =>
                            $subtotal,
                    ]);


                    continue;
                }


                /*
                |--------------------------------------------------------------------------
                | PRODUCT BIASA
                |--------------------------------------------------------------------------
                */

                $product = $products[
                    $item['product_id']
                ];


                $subtotal =
                    $product->harga *
                    $quantity;


                OrderItem::create([

                    'order_id' =>
                        $order->order_id,

                    'product_id' =>
                        $product->product_id,

                    'box_id' =>
                        null,

                    'jumlah' =>
                        $quantity,

                    'subtotal' =>
                        $subtotal,
                ]);
            }


            /*
            |--------------------------------------------------------------------------
            | SIMPAN TRANSAKSI DATABASE
            |--------------------------------------------------------------------------
            */

            DB::table('cart_items')
                ->where('user_id', Auth::id())
                ->delete();

            DB::commit();

            session()->forget('cart');


            /*
            |--------------------------------------------------------------------------
            | REDIRECT
            |--------------------------------------------------------------------------
            */

            return redirect()
                ->route('shop.allproducts')
                ->with(
                    'success',
                    'Pesanan berhasil dibuat.'
                );


        } catch (\Exception $e) {

            /*
            |--------------------------------------------------------------------------
            | JIKA GAGAL, BATalkan TRANSAKSI
            |--------------------------------------------------------------------------
            */

            DB::rollBack();


            return redirect()
                ->route('shop.cart')
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | USER - MY ORDERS
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $orders = Order::with([
            'items.product',
            'items.box'
        ])
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
    | USER - DETAIL ORDER
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $order = Order::with([
            'items.product',
            'items.box'
        ])
            ->where(
                'user_id',
                Auth::id()
            )
            ->where(
                'order_id',
                $id
            )
            ->firstOrFail();


        return view(
            'user.shop.order_detail',
            compact('order')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - DAFTAR ORDER
    |--------------------------------------------------------------------------
    */

    public function adminIndex()
    {
        $orders = Order::with([
            'user',
            'items.product',
            'items.box'
        ])
            ->latest('created_at')
            ->get();


        return view(
            'admin.shop.orders.index',
            compact('orders')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - DETAIL ORDER
    |--------------------------------------------------------------------------
    */

    public function adminShow($id)
    {
        $order = Order::with([
            'user',
            'items.product',
            'items.box'
        ])
            ->findOrFail($id);


        return view(
            'admin.shop.orders.show',
            compact('order')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - ACC / TERIMA ORDER
    |--------------------------------------------------------------------------
    */

    public function adminAccept($id)
    {
        DB::beginTransaction();


        try {

            $order = Order::with([
                'items.product',
                'items.box'
            ])
                ->lockForUpdate()
                ->findOrFail($id);


            /*
            |--------------------------------------------------------------------------
            | CEGAH ACC 2X
            |--------------------------------------------------------------------------
            */

            if (
                $order->status_pesanan !== 'Pending'
            ) {

                DB::rollBack();


                return redirect()
                    ->route('admin.orders.index')
                    ->with(
                        'error',
                        'Pesanan ini sudah diproses sebelumnya.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | PROSES ITEM PESANAN
            |--------------------------------------------------------------------------
            */

            foreach (
                $order->items as $item
            ) {

                /*
                |--------------------------------------------------------------------------
                | PRODUCT BIASA
                |--------------------------------------------------------------------------
                */

                if (
                    $item->product_id !== null
                ) {

                    $product = Product::lockForUpdate()
                        ->find(
                            $item->product_id
                        );


                    if (!$product) {

                        throw new \Exception(
                            'Produk tidak ditemukan.'
                        );
                    }


                    if (
                        $product->stok <
                        $item->jumlah
                    ) {

                        throw new \Exception(
                            'Stok ' .
                            $product->nama_produk .
                            ' tidak mencukupi.'
                        );
                    }


                    $product->stok =
                        $product->stok -
                        $item->jumlah;


                    $product->save();


                    continue;
                }


                /*
                |--------------------------------------------------------------------------
                | SMART CHILD BOX
                |--------------------------------------------------------------------------
                */

                if (
                    $item->box_id !== null
                ) {

                    $box = SmartChildBox::with([
                        'items.product'
                    ])
                        ->lockForUpdate()
                        ->find(
                            $item->box_id
                        );


                    if (!$box) {

                        throw new \Exception(
                            'Smart Child Box tidak ditemukan.'
                        );
                    }


                    foreach (
                        $box->items as $boxItem
                    ) {

                        $product = Product::lockForUpdate()
                            ->find(
                                $boxItem->product_id
                            );


                        if (!$product) {

                            throw new \Exception(
                                'Produk isi box tidak ditemukan.'
                            );
                        }


                        $jumlahDibutuhkan =
                            $boxItem->jumlah *
                            $item->jumlah;


                        if (
                            $product->stok <
                            $jumlahDibutuhkan
                        ) {

                            throw new \Exception(
                                'Stok isi ' .
                                $product->nama_produk .
                                ' tidak mencukupi untuk pesanan box.'
                            );
                        }


                        $product->stok =
                            $product->stok -
                            $jumlahDibutuhkan;


                        $product->save();
                    }
                }
            }


            /*
            |--------------------------------------------------------------------------
            | UPDATE STATUS ORDER
            |--------------------------------------------------------------------------
            */

            $order->payment_status =
                'Dikonfirmasi';

            $order->status_pesanan =
                'Diproses';

            $order->save();


            DB::commit();


            return redirect()
                ->route('admin.orders.index')
                ->with(
                    'success',
                    'Pesanan berhasil diterima. Pembayaran dikonfirmasi dan pesanan sedang diproses.'
                );


        } catch (\Exception $e) {

            DB::rollBack();


            return redirect()
                ->route('admin.orders.index')
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - TOLAK ORDER
    |--------------------------------------------------------------------------
    */

    public function adminReject($id)
    {
        $order = Order::findOrFail($id);


        if (
            $order->status_pesanan !== 'Pending'
        ) {

            return redirect()
                ->route('admin.orders.index')
                ->with(
                    'error',
                    'Pesanan ini sudah diproses sebelumnya.'
                );
        }


        $order->payment_status =
            'Ditolak';

        $order->status_pesanan =
            'Ditolak';

        $order->save();


        return redirect()
            ->route('admin.orders.index')
            ->with(
                'success',
                'Pesanan berhasil ditolak.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - KIRIM ORDER
    |--------------------------------------------------------------------------
    */

    public function adminShip($id)
    {
        $order = Order::findOrFail($id);


        if (
            $order->status_pesanan !== 'Diproses'
        ) {

            return redirect()
                ->route('admin.orders.index')
                ->with(
                    'error',
                    'Pesanan belum siap untuk dikirim.'
                );
        }


        $order->status_pesanan =
            'Dikirim';

        $order->save();


        return redirect()
            ->route('admin.orders.index')
            ->with(
                'success',
                'Pesanan berhasil dikirim.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - SELESAIKAN ORDER
    |--------------------------------------------------------------------------
    */

    public function adminComplete($id)
    {
        $order = Order::findOrFail($id);


        if (
            $order->status_pesanan !== 'Dikirim'
        ) {

            return redirect()
                ->route('admin.orders.index')
                ->with(
                    'error',
                    'Pesanan belum dikirim.'
                );
        }


        $order->status_pesanan =
            'Selesai';

        $order->save();


        return redirect()
            ->route('admin.orders.index')
            ->with(
                'success',
                'Pesanan berhasil diselesaikan.'
            );
    }
}