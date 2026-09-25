<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'nama_produk',
        'gambar',
        'kategori_usia',
        'kategori_perkembangan',
        'deskripsi',
        'harga',
        'stok',
        'is_box_item',
    ];
}