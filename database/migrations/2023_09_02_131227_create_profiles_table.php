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
        Schema::create('profiles', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('lastname');
                $table->string('designation');
                $table->date('birthday');
                $table->string('residence');
                $table->text('address');
                $table->string('email');
                $table->string('office_email');
                $table->string('phone');
                $table->string('office_phone');
                $table->string('skype');
                $table->boolean('freelance_status')->default(false);
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
