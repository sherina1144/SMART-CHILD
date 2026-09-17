<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $table = 'consultations';
    protected $primaryKey = 'consultation_id';

    protected $fillable = [
        'user_id',
        'doctor_id',
        'child_id',
        'child_name',
        'parent_name',
        'child_age',
        'child_gender',
        'phone_number',
        'email',
        'address',
        'consultation_type',
        'booking_date',
        'booking_time',
        'complaint',
        'payment_method',
        'payment_status',
        'status_konsultasi',
    ];

    // Relasi ke Model Doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'doctor_id');
    }
}