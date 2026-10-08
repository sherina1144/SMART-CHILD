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
        'duration',
        'instructor',
        'thumbnail',
        'video_url',
        'type', 
        'status',
    ];
}