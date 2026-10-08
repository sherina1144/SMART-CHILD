<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $table = 'community_threads';

    protected $fillable = [
        'user_id',       // Pastikan user_id ada di sini
        'category',
        'title',
        'content',
        'author_name',
        'author_avatar',
        'comments_count',
        'time_ago',
    ];

    // Relasi ke balasan (replies)
    public function replies()
    {
        return $this->hasMany(Reply::class, 'thread_id');
    }

    // Relasi ke User (pembuat thread) yang benar menggunakan kolom user_id
    public function user()
    {
        // Parameter: ModelTujuan::class, 'foreign_key_di_tabel_thread', 'owner_key_di_tabel_users'
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}