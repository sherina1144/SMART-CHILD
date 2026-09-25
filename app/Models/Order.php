<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'nomor_order',
        'user_id',
        'nama_penerima',
        'no_hp',
        'alamat',
        'metode_pembayaran',
        'bukti_pembayaran',
        'payment_status',
        'total_harga',
        'status_pesanan',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI USER
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'user_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI ORDER ITEMS
    |--------------------------------------------------------------------------
    */

    public function items()
    {
        return $this->hasMany(
            OrderItem::class,
            'order_id',
            'order_id'
        );
    }
}