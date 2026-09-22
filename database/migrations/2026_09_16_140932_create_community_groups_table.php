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
        Schema::create('community_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g. Newborn Parents
            $table->text('description');
            $table->string('member_count'); // e.g. 1.2k Anggota Aktif
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('community_groups');
    }
};
