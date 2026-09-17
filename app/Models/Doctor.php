<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';
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
    ];

    public function schedules()
    {
        return $this->hasMany(DoctorSchedule::class, 'doctor_id', 'doctor_id');
    }
}