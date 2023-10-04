<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->string('address');
            $table->string('password');
            $table->foreignId('roles_id')->constrained('roles');
            $table->foreignId('cities_id')->constrained('cities');
            $table->string('image_url')->nullable();
            $table->text('verify_token')->nullable();
            $table->integer('email_verified')->default(0);
            $table->dateTime('email_verified_at')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
