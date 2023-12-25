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
        Schema::table('principio', function (Blueprint $table) {
            $table->string('portada1')->nullable();
            $table->string('portada3')->nullable();
            $table->string('portada4')->nullable();
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('principio', function (Blueprint $table) {
            //
        });
    }
};
