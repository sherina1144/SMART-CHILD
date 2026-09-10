<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $primaryKey = 'doctor_id';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'kategori',
        'spesialisasi',
        'foto',
        'lama_pengalaman',
        'rating',
        'biaya_konsultasi',
        'jadwal_praktik',
    ];
}