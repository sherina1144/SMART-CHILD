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
            if (!Schema::hasColumn('parenting_academies', 'status')) {
                $table->enum('status', ['draft', 'published'])->default('published')->after('video_url');
            }
        });
    }

    public function down(): void
    {
        Schema::table('parenting_academies', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
