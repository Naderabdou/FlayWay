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
        Schema::create('tourist_destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('slug');
            $table->string('sub_title_ar');
            $table->string('sub_title_en');
            $table->string('price');
            //rate
            $table->string('rate');
            //العرض يحتوي على
            $table->text('includes_ar');
            $table->text('includes_en');
            //العرض لا يحتوي على
            $table->text('excludes_ar');
            $table->text('excludes_en');

            //image
            $table->string('image');
            $table->string('main_image');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tourist_destinations');
    }
};
