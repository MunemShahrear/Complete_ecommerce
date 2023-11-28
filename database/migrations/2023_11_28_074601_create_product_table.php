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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('pro_title');
            $table->string('main_category');
            $table->string('sub_category');
            $table->string('pro_brand')->nullable();
            $table->string('pro_model')->nullable();
            $table->string('pro_price')->nullable();
            $table->string('pro_sprice')->nullable();
            $table->string('pro_qty');
            $table->string('pro_waranty')->nullable();
            $table->string('pro_datasheet')->nullable();
            $table->string('pro_img1')->nullable();
            $table->string('pro_desc')->nullable();
            $table->string('pro_status')->nullable();
            $table->string('pro_discount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
