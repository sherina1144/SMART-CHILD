<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('partnerships', function (Blueprint $table) {
            $table->id('partnership_id');
            $table->string('nama_instansi', 150);
            $table->enum('tipe_partner', ['School', 'Business']);
            $table->string('kontak_person', 100);
            $table->string('email', 100);
            $table->text('pesan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('partnerships');
    }
};