<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentingAcademy extends Model
{
    use HasFactory;

    protected $table = 'parenting_academies';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'category',
        'thumbnail',
        'video_url',
        'status',
    ];
}