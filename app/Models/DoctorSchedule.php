<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    use HasFactory;

    protected $table = 'doctor_schedules';
    protected $primaryKey = 'schedule_id';

    protected $fillable = [
        'doctor_id',
        'day',
        'start_time',
        'end_time',
        'quota',
        'is_active',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'doctor_id');
    }
}