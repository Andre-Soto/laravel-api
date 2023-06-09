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
        Schema::create('customers', function (Blueprint $table) {
            $table->string('dni', 45)->primary();
            $table->unsignedBigInteger('id_reg');
            $table->foreign('id_reg')->references('id')->on('regions');
            $table->unsignedBigInteger('id_com');
            $table->foreign('id_com')->references('id')->on('communes');
            $table->string('email', 120);
            $table->string('name', 45);
            $table->string('last_name', 45);
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
