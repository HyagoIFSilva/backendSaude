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
        Schema::create('remedio_ubs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('remedio_id')->constrained('remedios')->onDelete('cascade');
            $table->foreignId('ubs_id')->constrained('ubs')->onDelete('cascade');
            $table->integer('quantidade')->default(0);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remedio_ubs');
    }
};
