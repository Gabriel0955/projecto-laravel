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
        Schema::create('principio', function (Blueprint $table) {
            $table->id();
            $table->string('portada')->nullable();
            $table->string('novedad1')->nullable();
            $table->string('novedad2')->nullable();
            $table->string('novedad3')->nullable();
            $table->string('portada2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('principio');
    }
};
