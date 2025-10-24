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
        Schema::create('jovens', function (Blueprint $table) {
            $table->id();
            $table->string('nome_completo');
            $table->string('nome_social')->nullable();
            $table->string('email')->nullable();
            $table->string('telefone');
            $table->date('data_nascimento');
            $table->string('genero')->nullable();
            $table->string('orientacao_sexual')->nullable();
            $table->string('raca');
            $table->string('situacao_atual')->nullable();
            $table->string('escolaridade')->nullable();
            $table->string('oportunidades')->nullable();
            $table->string('interesse')->nullable();
            $table->boolean('portador_deficiencia')->default(false);
            $table->string('estado');
            $table->string('cidade');
            $table->string('portfolio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jovems');
    }
};
