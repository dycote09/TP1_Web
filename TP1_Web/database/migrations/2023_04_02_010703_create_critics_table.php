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
        Schema::create('critics', function (Blueprint $table) {
            $table->id('id');
            $table->int('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->int('film_id');
            $table->foreign('film_id')->references('id')->on('films');
            $table->decimal('score');
            $table->string('comment');        
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('critics');
    }
};
