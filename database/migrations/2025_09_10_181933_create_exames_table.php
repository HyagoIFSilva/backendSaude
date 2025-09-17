<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exames', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('tipo_exame');
            $table->string('image_path'); 
            $table->timestamps(); 
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exames');
    }
};