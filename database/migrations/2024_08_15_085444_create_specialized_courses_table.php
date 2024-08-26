<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('specialized_courses', function (Blueprint $table) {
            $table->id();
            $table->text('features_ar');
            $table->text('features_en');
            $table->string('image');
            $table->softDeletes();

                   $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialized_courses');
    }
};
