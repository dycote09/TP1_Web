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
        Schema::create('films', function (Blueprint $table) {
            $table->id('id');
            $table->string('title');
            $table->string('release_year');
            $table->int('length');
            $table->string('description');
            $table->string('rating');
            $table->int('language_id');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->string('special_features');
            $table->string('image');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
