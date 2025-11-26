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
    Schema::create('vaccines', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->string('name'); // Nome da vacina
        $table->date('date'); // Data da aplicação ou agendamento
        $table->enum('status', ['tomada', 'pendente', 'atrasada'])->default('pendente');
        $table->string('batch')->nullable(); // Lote (opcional)
        $table->string('location')->nullable(); // Local (opcional)
        $table->text('notes')->nullable();
        $table->timestamps();
    });
}   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccines');
    }
};
