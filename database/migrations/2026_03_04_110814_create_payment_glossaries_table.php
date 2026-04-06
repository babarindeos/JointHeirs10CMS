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
        Schema::create('payment_glossaries', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->integer('month');
            $table->integer('year');
            $table->string('file'); 
            $table->string('reference_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_glossaries');
    }
};
