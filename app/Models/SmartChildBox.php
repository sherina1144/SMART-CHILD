<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmartChildBox extends Model
{
    protected $table = 'smart_child_boxes';

    protected $primaryKey = 'box_id';

    protected $fillable = [
        'nama_box',
        'kategori_usia',
        'deskripsi',
        'harga',
        'gambar',
        'urutan',
    ];

    public function items()
    {
        return $this->hasMany(
            SmartChildBoxItem::class,
            'box_id',
            'box_id'
        );
    }
}