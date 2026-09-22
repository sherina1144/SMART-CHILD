<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('children', function (Blueprint $table) {
            $table->id('child_id');
            $table->foreignId('user_id')->constrained('users', 'user_id')->onDelete('cascade');
            $table->string('nama_anak', 100);
            $table->date('tanggal_lahir');
            $table->enum('gender', ['L', 'P']);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('children');
    }
};