<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('water_intakes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->date('date');
        $table->integer('amount_consumed')->default(0); 
        $table->integer('daily_goal')->nullable(); 
        $table->timestamps();
        $table->unique(['user_id', 'date']);
    });
}
};
