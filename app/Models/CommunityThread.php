<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityThread extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'author_name',
        'author_avatar',
        'title',
        'comments_count',
        'time_ago',
    ];
}