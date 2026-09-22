<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('parenting_academies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('category')->nullable(); // Contoh: Tips Tumbuh Kembang, Psikologi Anak, Nutrisi
            $table->string('thumbnail')->nullable(); // Untuk path gambar/poster
            $table->string('video_url')->nullable(); // Jika materinya berupa video
            $table->enum('status', ['draft', 'published'])->default('published');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parenting_academy');
    }
};