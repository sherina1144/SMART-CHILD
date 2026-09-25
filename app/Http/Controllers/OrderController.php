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
            'nama_penerima.required' => 'Nama penerima wajib diisi.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'metode_pembayaran.required' => 'Metode pembayaran wajib dipilih.',
            'metode_pembayaran.in' => 'Metode pembayaran tidak valid.',
        ]);

        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('shop.cart')
                ->with('error', 'Keranjang masih kosong.');
        }

        DB::beginTransaction();

        try {

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
            | AMBIL DATA PRODUCT
            |--------------------------------------------------------------------------
            */

            $products = Product::whereIn('product_id', $productIds)
                ->lockForUpdate()
                ->get()
                ->keyBy('product_id');

            /*
            |--------------------------------------------------------------------------
            | AMBIL DATA SMART CHILD BOX
            |--------------------------------------------------------------------------
            */

            $boxes = SmartChildBox::whereIn('box_id', $boxIds)
                ->lockForUpdate()
                ->get()
                ->keyBy('box_id');

            $total = 0;

            /*
            |--------------------------------------------------------------------------
            | CEK ISI KERANJANG
            |--------------------------------------------------------------------------
            */

            foreach ($cart as $item) {

                $quantity = (int) ($item['quantity'] ?? 0);

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

                if (($item['type'] ?? 'product') === 'box') {

                    if (!isset($boxes[$item['box_id']])) {
                        throw new \Exception(
                            'Smart Child Box tidak ditemukan.'
                        );
                    }

                    $box = $boxes[$item['box_id']];

                    if ($box->harga === null) {
                        throw new \Exception(
                            'Smart Child Box belum memiliki harga.'
                        );
                    }

                    $total += $box->harga * $quantity;

                    continue;
                }

                /*
                |--------------------------------------------------------------------------
                | PRODUCT BIASA
                |--------------------------------------------------------------------------
                */

                if (!isset($products[$item['product_id']])) {
                    throw new \Exception(
                        'Produk tidak ditemukan.'
                    );
                }

                $product = $products[$item['product_id']];

                /*
                | Stok belum dikurangi di sini.
                | Stok baru dikurangi ketika admin ACC pesanan.
                */

                if ($quantity > $product->stok) {
                    throw new \Exception(
                        'Stok ' . $product->nama_produk .
                        ' tidak mencukupi.'
                    );
                }

                $total += $product->harga * $quantity;
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

                'user_id' => Auth::id(),

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
            |--------------------------------------------------------------------------
            | SIMPAN ORDER ITEM
            |--------------------------------------------------------------------------
            */

            foreach ($cart as $item) {

                $quantity = (int) ($item['quantity'] ?? 0);

                /*
                |--------------------------------------------------------------------------
                | SMART CHILD BOX
                |--------------------------------------------------------------------------
                */

                if (($item['type'] ?? 'product') === 'box') {

                    $box = $boxes[$item['box_id']];

                    $subtotal =
                        $box->harga * $quantity;

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

                $product =
                    $products[$item['product_id']];

                $subtotal =
                    $product->harga * $quantity;

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
            | KOSONGKAN CART
            |--------------------------------------------------------------------------
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
    | ADMIN - ACC / TERIMA ORDER
    |--------------------------------------------------------------------------
    |
    | Ketika admin menerima pesanan:
    |
    | Product biasa:
    | stok dikurangi sesuai jumlah yang dipesan.
    |
    | Smart Child Box:
    | stok setiap isi box dikurangi berdasarkan:
    |
    | jumlah produk dalam box x jumlah box yang dipesan.
    |
    */

    public function adminAccept($id)
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | AMBIL ORDER
            |--------------------------------------------------------------------------
            */

            $order = Order::with([
                'items.product',
                'items.box'
            ])
                ->lockForUpdate()
                ->findOrFail($id);


            /*
            |--------------------------------------------------------------------------
            | CEGAH ORDER DI-ACC 2X
            |--------------------------------------------------------------------------
            */

            if ($order->status_pesanan !== 'Pending') {

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
            | PROSES SETIAP ITEM
            |--------------------------------------------------------------------------
            */

            foreach ($order->items as $item) {

                /*
                |--------------------------------------------------------------------------
                | PRODUCT BIASA
                |--------------------------------------------------------------------------
                */

                if ($item->product_id !== null) {

                    $product = Product::lockForUpdate()
                        ->find($item->product_id);

                    if (!$product) {
                        throw new \Exception(
                            'Produk tidak ditemukan.'
                        );
                    }

                    if ($product->stok < $item->jumlah) {

                        throw new \Exception(
                            'Stok ' .
                            $product->nama_produk .
                            ' tidak mencukupi.'
                        );
                    }

                    /*
                    | KURANGI STOK
                    */

                    $product->stok =
                        $product->stok - $item->jumlah;

                    $product->save();

                    continue;
                }


                /*
                |--------------------------------------------------------------------------
                | SMART CHILD BOX
                |--------------------------------------------------------------------------
                */

                if ($item->box_id !== null) {

                    $box = SmartChildBox::with([
                        'items.product'
                    ])
                        ->lockForUpdate()
                        ->find($item->box_id);

                    if (!$box) {
                        throw new \Exception(
                            'Smart Child Box tidak ditemukan.'
                        );
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | CEK DAN KURANGI STOK SEMUA ISI BOX
                    |--------------------------------------------------------------------------
                    */

                    foreach ($box->items as $boxItem) {

                        $product = Product::lockForUpdate()
                            ->find($boxItem->product_id);

                        if (!$product) {
                            throw new \Exception(
                                'Produk isi box tidak ditemukan.'
                            );
                        }


                        /*
                        | Contoh:
                        |
                        | Box berisi:
                        | Shape Sorter = 1
                        |
                        | User beli:
                        | 2 Box
                        |
                        | Stok dikurangi:
                        | 1 x 2 = 2
                        */

                        $jumlahDibutuhkan =
                            $boxItem->jumlah *
                            $item->jumlah;


                        if (
                            $product->stok
                            <
                            $jumlahDibutuhkan
                        ) {

                            throw new \Exception(
                                'Stok isi ' .
                                $product->nama_produk .
                                ' tidak mencukupi untuk pesanan box.'
                            );
                        }


                        /*
                        | KURANGI STOK
                        */

                        $product->stok =
                            $product->stok
                            -
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

            $order->status_pesanan =
                'Diproses';

            $order->save();


            /*
            |--------------------------------------------------------------------------
            | COMMIT
            |--------------------------------------------------------------------------
            */

            DB::commit();

            return redirect()
                ->route('admin.orders.index')
                ->with(
                    'success',
                    'Pesanan berhasil diterima dan sedang diproses.'
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


        /*
        |--------------------------------------------------------------------------
        | CEGAH ORDER YANG SUDAH DIPROSES
        |--------------------------------------------------------------------------
        */

        if ($order->status_pesanan !== 'Pending') {

            return redirect()
                ->route('admin.orders.index')
                ->with(
                    'error',
                    'Pesanan ini sudah diproses sebelumnya.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE STATUS
        |--------------------------------------------------------------------------
        */

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
}