<?php

namespace App\Http\Controllers;

use App\Models\SmartChildBox;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SmartChildBoxController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | USER - SMART CHILD BOX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $boxes = SmartChildBox::with([
            'items.product'
        ])
        ->orderBy('urutan')
        ->get();

        $activeBoxId = request('box');

        if ($activeBoxId) {
            $activeBox = $boxes->firstWhere(
                'box_id',
                $activeBoxId
            );
        } else {
            $activeBox = $boxes->first();
        }

        if (!$activeBox) {
            abort(404);
        }

        return view(
            'user.shop.smart_childbox',
            compact(
                'boxes',
                'activeBox'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - SMART CHILD BOX
    |--------------------------------------------------------------------------
    */

    public function adminIndex()
    {
        $boxes = SmartChildBox::with([
            'items.product'
        ])
        ->orderBy('urutan')
        ->get();

        return view(
            'admin.shop.smart_child_box.index',
            compact('boxes')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - CREATE
    |--------------------------------------------------------------------------
    */
    public function adminCreate()
    {
        $products = Product::orderBy('nama_produk')->get();

        return view(
            'admin.shop.smart_child_box.create',
            compact('products')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - STORE
    |--------------------------------------------------------------------------
    */

    public function adminStore(Request $request)
    {
        $request->validate([
            'nama_box' => 'required|string|max:150',
            'kategori_usia' => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'urutan' => 'required|integer|min:1',

            'products' => 'nullable|array',
            'products.*.product_id' => 'nullable|exists:products,product_id',
            'products.*.jumlah' => 'nullable|integer|min:1',
            'products.*.satuan' => 'nullable|string|max:50',
        ]);


        /*
        |--------------------------------------------------------------------------
        | UPLOAD GAMBAR
        |--------------------------------------------------------------------------
        */

        $gambar = null;

        if ($request->hasFile('gambar')) {

            $folder = public_path('images');

            if (!is_dir($folder)) {
                mkdir($folder, 0755, true);
            }

            $file = $request->file('gambar');

            $namaFile = Str::uuid() . '.' .
                $file->getClientOriginalExtension();

            $file->move($folder, $namaFile);

            $gambar = $namaFile;
        }


        /*
        |--------------------------------------------------------------------------
        | SIMPAN BOX
        |--------------------------------------------------------------------------
        */

        $box = SmartChildBox::create([
            'nama_box' => $request->nama_box,
            'kategori_usia' => $request->kategori_usia,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' => $gambar,
            'urutan' => $request->urutan,
        ]);


        /*
        |--------------------------------------------------------------------------
        | SIMPAN PRODUK ISI BOX
        |--------------------------------------------------------------------------
        */

        if ($request->products) {

            foreach ($request->products as $product) {

                if (
                    empty($product['product_id']) ||
                    empty($product['jumlah'])
                ) {
                    continue;
                }

                $box->items()->create([
                    'product_id' => $product['product_id'],
                    'jumlah' => $product['jumlah'],
                    'satuan' => $product['satuan'] ?? 'pcs',
                ]);
            }
        }


        return redirect()
            ->route('admin.smartbox.index')
            ->with(
                'success',
                'Smart Child Box berhasil ditambahkan.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - EDIT
    |--------------------------------------------------------------------------
    */

    public function adminEdit($box)
    {
        $box = SmartChildBox::with([
            'items.product'
        ])->findOrFail($box);

        $products = Product::orderBy('nama_produk')->get();

        return view(
            'admin.shop.smart_child_box.edit',
            compact('box', 'products')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - UPDATE
    |--------------------------------------------------------------------------
    */

    public function adminUpdate(Request $request, $box)
    {
        $box = SmartChildBox::findOrFail($box);

        $request->validate([
            'nama_box' => 'required|string|max:150',
            'kategori_usia' => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'urutan' => 'required|integer|min:1',

            'products' => 'nullable|array',
            'products.*.product_id' => 'nullable|exists:products,product_id',
            'products.*.jumlah' => 'nullable|integer|min:1',
            'products.*.satuan' => 'nullable|string|max:50',
        ]);


        /*
        |--------------------------------------------------------------------------
        | GAMBAR
        |--------------------------------------------------------------------------
        */

        $gambar = $box->gambar;

        if ($request->hasFile('gambar')) {

            if (
                $box->gambar &&
                file_exists(
                    public_path('images/' . $box->gambar)
                )
            ) {
                unlink(
                    public_path('images/' . $box->gambar)
                );
            }

            $folder = public_path('images');

            if (!is_dir($folder)) {
                mkdir($folder, 0755, true);
            }

            $file = $request->file('gambar');

            $namaFile = Str::uuid() . '.' .
                $file->getClientOriginalExtension();

            $file->move($folder, $namaFile);

            $gambar = $namaFile;
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE BOX
        |--------------------------------------------------------------------------
        */

        $box->update([
            'nama_box' => $request->nama_box,
            'kategori_usia' => $request->kategori_usia,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' => $gambar,
            'urutan' => $request->urutan,
        ]);


        /*
        |--------------------------------------------------------------------------
        | UPDATE ISI BOX
        |--------------------------------------------------------------------------
        */

        $box->items()->delete();

        if ($request->products) {

            foreach ($request->products as $product) {

                if (
                    empty($product['product_id']) ||
                    empty($product['jumlah'])
                ) {
                    continue;
                }

                $box->items()->create([
                    'product_id' => $product['product_id'],
                    'jumlah' => $product['jumlah'],
                    'satuan' => $product['satuan'] ?? 'pcs',
                ]);
            }
        }


        return redirect()
            ->route('admin.smartbox.index')
            ->with(
                'success',
                'Smart Child Box berhasil diperbarui.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - DELETE
    |--------------------------------------------------------------------------
    */

    public function adminDestroy($box)
    {
        $box = SmartChildBox::findOrFail($box);

        /*
        |--------------------------------------------------------------------------
        | HAPUS ITEM BOX DULU
        |--------------------------------------------------------------------------
        */

        $box->items()->delete();


        /*
        |--------------------------------------------------------------------------
        | HAPUS GAMBAR
        |--------------------------------------------------------------------------
        */

        if (
            $box->gambar &&
            file_exists(
                public_path('images/' . $box->gambar)
            )
        ) {
            unlink(
                public_path('images/' . $box->gambar)
            );
        }


        /*
        |--------------------------------------------------------------------------
        | HAPUS BOX
        |--------------------------------------------------------------------------
        */

        $box->delete();


        return redirect()
            ->route('admin.smartbox.index')
            ->with(
                'success',
                'Smart Child Box berhasil dihapus.'
            );
    }
}