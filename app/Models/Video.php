<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'videos'; // Sesuaikan jika nama tabelnya berbeda

    protected $fillable = [
        'title',
        'category',
        'instructor',
        'duration',
        'video_url',
        'description',
        'thumbnail',
    ];
}
