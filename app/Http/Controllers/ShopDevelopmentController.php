<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ShopDevelopmentController extends Controller
{
    public function index()
    {
        $query = Product::where('is_box_item', 0)
            ->whereNotNull('kategori_perkembangan');

        if (request('development')) {
            $query->where(
                'kategori_perkembangan',
                request('development')
            );
        }

        if (request('sort') === 'termurah') {
            $query->orderBy('harga', 'asc');
        } elseif (request('sort') === 'termahal') {
            $query->orderBy('harga', 'desc');
        } elseif (request('sort') === 'nama') {
            $query->orderBy('nama_produk', 'asc');
        }

        $products = $query->limit(8)->get();

        return view(
            'user.shop.shop_bydevelopment',
            compact('products')
        );
    }

    public function allProducts()
    {
        $query = Product::where('is_box_item', 0)
            ->whereNotNull('kategori_perkembangan');

        if (request('development')) {
            $query->where(
                'kategori_perkembangan',
                request('development')
            );
        }

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