<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = ['user_id', 'category', 'title', 'content', 'comments_count'];

    // PASTIKAN MENGGUNAKAN PUBLIC
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}