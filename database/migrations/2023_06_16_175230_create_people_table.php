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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('idade');
            $table->string('cpf');
            $table->string('rg');
            $table->string('data_nasc');
            $table->string('sexo');
            $table->string('signo');
            $table->string('mae');
            $table->string('pai');
            $table->string('email');
            $table->string('senha');
            $table->string('cep');
            $table->string('endereco');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->string('telefone_fixo');
            $table->string('celular');
            $table->string('altura');
            $table->string('peso');
            $table->string('tipo_sanguineo');
            $table->string('cor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
