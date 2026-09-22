<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('community_posts', function (Blueprint $table) {
            $table->id('post_id');
            $table->foreignId('user_id')->constrained('users', 'user_id')->onDelete('cascade');
            $table->string('judul', 200);
            $table->text('isi_posting');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('community_posts');
    }
};