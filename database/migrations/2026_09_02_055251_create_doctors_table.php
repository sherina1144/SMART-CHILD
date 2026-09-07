<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id('doctor_id');
            $table->foreignId('user_id')->constrained('users', 'user_id')->onDelete('cascade');
            $table->string('spesialisasi', 100);
            $table->decimal('biaya_konsultasi', 10, 2);
            $table->text('jadwal_praktik')->nullable();
        });
    }

    public function down(): void {
        Schema::dropIfExists('doctors');
    }
};