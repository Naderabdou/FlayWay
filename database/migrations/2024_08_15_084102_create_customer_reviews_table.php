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
        Schema::create('customer_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar'); // اسم العميل
            $table->string('name_en'); // اسم العميل
            $table->text('review_ar'); // نص التقييم
            $table->text('review_en'); // نص التقييم
            $table->integer('rating'); // تقييم رقمي (من 1 إلى 5)
            $table->softDeletes();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_reviews');
    }
};
