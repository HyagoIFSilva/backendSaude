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
    Schema::table('users', function (Blueprint $table) {
        $table->string('cep', 9)->nullable()->after('password'); 
        $table->string('logradouro')->nullable()->after('cep');
        $table->string('numero')->nullable()->after('logradouro');
        $table->string('bairro')->nullable()->after('numero');
        $table->string('cidade')->nullable()->after('bairro');
        $table->string('uf', 2)->nullable()->after('cidade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
