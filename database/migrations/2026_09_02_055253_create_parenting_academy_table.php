<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('parenting_academy', function (Blueprint $table) {
            $table->id('academy_id');
            $table->string('judul', 200);
            $table->string('kategori', 100)->nullable();
            $table->text('konten');
            $table->string('penulis', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('parenting_academy');
    }
};