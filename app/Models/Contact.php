<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $primaryKey = 'contact_id'; // Sesuai dengan kolom primary key di desc contacts kamu

    protected $fillable = [
        'nama',
        'email',
        'subjek',
        'pesan'
    ];
}