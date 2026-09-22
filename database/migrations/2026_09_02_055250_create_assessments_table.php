<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id('assessment_id');
            $table->foreignId('child_id')->constrained('children', 'child_id')->onDelete('cascade');
            $table->text('hasil_asesmen');
            $table->text('rekomendasi');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('assessments');
    }
};