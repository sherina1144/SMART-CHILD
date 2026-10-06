<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $table = 'replies'; // Sesuaikan jika nama tabel balasanmu berbeda

    protected $fillable = [
        'thread_id',
        'user_id',
        'content',
    ];

    // Relasi ke User (pembuat balasan)
    public function user()
    {
        // Parameter: ModelTujuan::class, 'foreign_key_di_tabel_replies', 'owner_key_di_tabel_users'
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}