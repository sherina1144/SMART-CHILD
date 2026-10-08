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
            $table->enum('category', ['nutrisi', 'tumbuh kembang', 'kesehatan', 'psikologi']);
            $table->string('thumbnail');
            $table->text('description');

            // Kolom duration dibuat nullable karena artikel tidak butuh durasi video
            $table->string('duration')->nullable();

            // Kolom link untuk URL eksternal / Google Drive / artikel
            $table->string('link')->nullable();

            $table->enum('type', ['article', 'video'])->default('article');
            $table->enum('status', ['draft', 'published'])->default('published');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parenting_academies');
    }
};