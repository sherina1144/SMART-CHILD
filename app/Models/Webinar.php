<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    protected $fillable = ['title', 'speaker', 'schedule', 'image', 'registration_url'];
}
