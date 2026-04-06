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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('month');
            $table->integer('year');
            $table->date('date_collected');
            $table->decimal('loan_collected', 10, 2);
            $table->string('interest_payment_mode');
            $table->decimal('interest', 10, 2);
            $table->decimal('loan_repay', 10, 2);
            $table->decimal('cumulative_repay', 10, 2);
            $table->decimal('loan_balance', 10, 2);
            $table->date('loan_date');
            $table->text('remarks')->nullable();
            $table->string('reference_id')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
