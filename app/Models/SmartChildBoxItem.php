<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmartChildBoxItem extends Model
{
    protected $table = 'smart_child_box_items';

    protected $primaryKey = 'box_item_id';

    public $timestamps = false;

    protected $fillable = [
        'box_id',
        'product_id',
        'jumlah',
        'satuan',
    ];

    public function box()
    {
        return $this->belongsTo(
            SmartChildBox::class,
            'box_id',
            'box_id'
        );
    }

    public function product()
    {
        return $this->belongsTo(
            Product::class,
            'product_id',
            'product_id'
        );
    }
}