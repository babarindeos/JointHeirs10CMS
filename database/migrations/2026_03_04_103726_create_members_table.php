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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('cardno')->unique();
            $table->string('surname');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->date('dob');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('occupation')->nullable();
            $table->string('home_addr')->nullable();
            $table->string('denomination')->nullable();
            $table->string('denomination_addr')->nullable();
            $table->string('nok')->nullable();
            $table->string('nok_phone')->nullable();
            $table->string('nok_addr')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('set null');
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('picture')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
