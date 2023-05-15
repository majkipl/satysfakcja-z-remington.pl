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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 128);
            $table->string('lastname', 128);
            $table->string('email', 255)->unique();
            $table->string('phone', 20);
            $table->string('address', 255);
            $table->string('city', 64);
            $table->string('code', 6);
            $table->string('iban', 29);
            $table->string('reason', 1024);
            $table->string('img_receipt', 255);
            $table->boolean('legal_1')->default(true);
            $table->boolean('legal_2')->default(true);
            $table->boolean('legal_3')->default(true);
            $table->boolean('legal_4');
            $table->unsignedBigInteger('voivodeship_id');
            $table->foreign('voivodeship_id')->references('id')->on('voivodeships')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
