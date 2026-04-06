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
        Schema::create('failed_payments', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->integer('month');
            $table->integer('year');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('dev_levy', 10, 2);
            $table->decimal('pension', 10, 2);
            $table->decimal('savings', 10, 2);
            $table->decimal('shares', 10, 2);
            $table->date('payment_date');
            $table->text('remarks')->nullable();
            $table->string('post_mode');
            $table->string('reference_id')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('failed_payments');
    }
};
