<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Search nama produk
        if ($request->filled('search')) {
            $query->where(
                'nama_produk',
                'like',
                '%' . $request->search . '%'
            );
        }

        // Filter kategori usia
        if ($request->filled('kategori_usia')) {
            $query->where(
                'kategori_usia',
                $request->kategori_usia
            );
        }

        // Filter kategori perkembangan
        if ($request->filled('kategori_perkembangan')) {
            $query->where(
                'kategori_perkembangan',
                $request->kategori_perkembangan
            );
        }

        $products = $query
            ->orderBy('product_id', 'desc')
            ->get();

        return view(
            'admin.shop.products.index',
            compact('products')
        );
    }

    /**
     * Menampilkan form tambah produk
     */
    public function create()
    {
        return view('admin.shop.products.create');
    }

    /**
     * Menyimpan produk baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:150',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'kategori_usia' => 'required|string|max:50',
            'kategori_perkembangan' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'is_box_item' => 'required|boolean',
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');

            $namaFile = time() . '_' . $file->getClientOriginalName();

            $file->move(
                public_path('images'),
                $namaFile
            );

            $gambar = $namaFile;
        }

        Product::create([
            'nama_produk' => $request->nama_produk,
            'gambar' => $gambar,
            'kategori_usia' => $request->kategori_usia,
            'kategori_perkembangan' => $request->kategori_perkembangan,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'is_box_item' => $request->is_box_item,
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit produk
     */
    public function edit($product)
    {
        $product = Product::findOrFail($product);

        return view(
            'admin.shop.products.edit',
            compact('product')
        );
    }

    /**
     * Mengupdate produk
     */
    public function update(Request $request, $product)
    {
        $product = Product::findOrFail($product);

        $request->validate([
            'nama_produk' => 'required|string|max:150',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'kategori_usia' => 'required|string|max:50',
            'kategori_perkembangan' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'is_box_item' => 'required|boolean',
        ]);

        $gambar = $product->gambar;

        if ($request->hasFile('gambar')) {

            // Hapus gambar lama jika ada
            if (
                $product->gambar &&
                file_exists(public_path('images/' . $product->gambar))
            ) {
                unlink(public_path('images/' . $product->gambar));
            }

            $file = $request->file('gambar');

            $namaFile = time() . '_' . $file->getClientOriginalName();

            $file->move(
                public_path('images'),
                $namaFile
            );

            $gambar = $namaFile;
        }

        $product->update([
            'nama_produk' => $request->nama_produk,
            'gambar' => $gambar,
            'kategori_usia' => $request->kategori_usia,
            'kategori_perkembangan' => $request->kategori_perkembangan,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'is_box_item' => $request->is_box_item,
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Menghapus produk
     */
    public function destroy($product)
    {
        $product = Product::findOrFail($product);

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}