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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone_number')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('user_city')->nullable(); 
            $table->string('user_district')->nullable();
            $table->string('user_commune')->nullable();
            $table->string('user_village')->nullable();
            $table->string('user_specific_address')->nullable(); // Địa chỉ cụ thể
            $table->enum('has_address',['yes','no'])->default('no');
            $table->integer('roles')->default(0); // Quyền 
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
