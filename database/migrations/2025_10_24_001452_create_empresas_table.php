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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(false);

            // Dados da empresa
            $table->string('razao_social');
            $table->string('nome_fantasia');
            $table->string('cnpj')->unique();
            $table->string('inscricao_estadual')->nullable();
            $table->date('data_fundacao');

            // Endereço
            $table->string('logradouro');
            $table->string('bairro');
            $table->string('estado');
            $table->string('cidade');
            $table->string('cep');

            // Contato empresa
            $table->string('telefone_fixo');
            $table->string('email_principal');

            // Responsável
            $table->string('nome_completo');
            $table->string('cpf')->unique();
            $table->string('cargo');
            $table->string('email_contato');

            // Modelo de atuação
            $table->string('modelo_atuacao');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
