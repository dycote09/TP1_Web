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
            $table->id()->autoIncrement();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('last_name');
            $table->string('first_name');
            $table->unsignedBigInteger('role_id')->default('2');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->string('rememberToken')->nullable()->default(null);
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable()->default(null);
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
