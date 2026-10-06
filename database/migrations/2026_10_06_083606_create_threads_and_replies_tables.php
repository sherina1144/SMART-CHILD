<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('discussion_group_id')->nullable()->constrained('discussion_groups')->onDelete('set null');
            $table->string('category'); // Pastikan baris ini ada
            $table->string('title');
            $table->text('content')->nullable();
            $table->integer('comments_count')->default(0);
            $table->timestamps();
        });
        
        Schema::create('replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('thread_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('body');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('replies');
        Schema::dropIfExists('threads');
    }
};