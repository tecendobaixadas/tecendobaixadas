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
        Schema::create('ongs', function (Blueprint $table) {
            $table->id();
            $table->string('nome_organizacao');
            $table->string('cnpj')->nullable();
            $table->string('natureza_juridica');
            $table->date('data_fundacao')->nullable();
            $table->string('area_atuacao');
            $table->string('modelo_atuacao');
            $table->string('logradouro');
            $table->string('bairro');
            $table->string('estado');
            $table->string('cidade');
            $table->string('cep');
            $table->string('telefone_fixo');
            $table->string('email_principal');
            $table->string('site')->nullable();
            $table->string('nome_completo_responsavel');
            $table->string('cpf_responsavel');
            $table->string('cargo_responsavel');
            $table->string('email_contato');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ongs');
    }
};
