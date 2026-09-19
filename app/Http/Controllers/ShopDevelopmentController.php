<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ShopDevelopmentController extends Controller
{
    public function index()
    {
        $query = Product::whereNotNull('kategori_perkembangan')
            ->where('stok', '>', 0);

        // Filter berdasarkan perkembangan
        if (request('development')) {
            $query->where(
                'kategori_perkembangan',
                request('development')
            );
        }

        // Sorting
        if (request('sort') === 'termurah') {
            $query->orderBy('harga', 'asc');
        } elseif (request('sort') === 'termahal') {
            $query->orderBy('harga', 'desc');
        } elseif (request('sort') === 'nama') {
            $query->orderBy('nama_produk', 'asc');
        }

        // Kalau belum klik "Lihat Semua Produk",
        // tampilkan maksimal 8 produk saja
        if (!request('all')) {
            $query->limit(8);
        }

        $products = $query->get();

        return view(
            'user.shop.shop_bydevelopment',
            compact('products')
        );
    }

    public function allProducts()
{
    $query = Product::whereNotNull('kategori_perkembangan')
        ->where('stok', '>', 0);

    // Filter
    if (request('development')) {
        $query->where(
            'kategori_perkembangan',
            request('development')
        );
    }

    // Urutkan
    if (request('sort') === 'termurah') {

        $query->orderBy('harga', 'asc');

    } elseif (request('sort') === 'termahal') {

        $query->orderBy('harga', 'desc');

    } elseif (request('sort') === 'nama') {

        $query->orderBy('nama_produk', 'asc');

    }

    $products = $query->get();

    return view(
        'user.shop.all_products',
        compact('products')
    );
}
}