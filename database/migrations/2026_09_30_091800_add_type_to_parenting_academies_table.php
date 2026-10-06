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
        Schema::table('parenting_academies', function (Blueprint $table) {
            $table->string('type')->default('article')->after('slug'); // Menyesuaikan posisi kolom
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parenting_academies', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
