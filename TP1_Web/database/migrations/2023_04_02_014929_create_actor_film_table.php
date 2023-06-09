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
        Schema::create('actor_film', function (Blueprint $table) {
            $table->unsignedBigInteger('actor_id');
            $table->unsignedBigInteger('film_id');
            $table->foreign('actor_id')->references('id')->on('actors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('film_id')->references('id')->on('films')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('actor_film', function (Blueprint $table) {
            $table->dropPrimary();
            $table->dropColumn('actor_id');
            $table->unsignedBigInteger('actor_id')->change();
            $table->primary(['actor_id', 'film_id']);
        });
    }
};
