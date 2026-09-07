<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id('consultation_id');
            $table->foreignId('user_id')->constrained('users', 'user_id');
            $table->foreignId('child_id')->constrained('children', 'child_id');
            $table->foreignId('doctor_id')->constrained('doctors', 'doctor_id');
            $table->dateTime('date_jadwal');
            $table->string('status_konsultasi', 50)->default('Scheduled');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('consultations');
    }
};