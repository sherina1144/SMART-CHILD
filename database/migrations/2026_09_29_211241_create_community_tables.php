<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // 1. Tabel Grup Diskusi Tahap Usia
        Schema::create('discussion_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Contoh: Newborn Parents
            $table->text('description');
            $table->string('active_members')->default('0'); // Contoh: 1.2k Anggota Aktif
            $table->timestamps();
        });

        // 2. Tabel Thread / Diskusi Hangat
        Schema::create('threads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Terhubung ke user sesuai ERD
            $table->foreignId('discussion_group_id')->nullable()->constrained('discussion_groups')->onDelete('set null');
            $table->string('category'); // Contoh: Nutrisi & MPASI
            $table->string('title');
            $table->text('content')->nullable();
            $table->integer('comments_count')->default(0);
            $table->timestamps();
        });

        // 3. Tabel Webinar & Kelas Online
        Schema::create('webinars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('speaker'); // Narasumber
            $table->string('schedule'); // Jadwal (Sabtu, 24 Jan 2026...)
            $table->string('image')->nullable();
            $table->string('registration_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webinars');
        Schema::dropIfExists('threads');
        Schema::dropIfExists('discussion_groups');
    }
};