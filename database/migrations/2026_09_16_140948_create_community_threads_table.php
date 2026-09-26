<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('community_threads', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // e.g. Nutrisi & MPASI
            $table->string('author_name'); // e.g. Bunda Clara
            $table->string('author_avatar')->nullable();
            $table->string('title');
            $table->integer('comments_count')->default(0);
            $table->string('time_ago'); // e.g. 12 menit lalu
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('community_threads');
    }
};
