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
        Schema::create('oportunidades', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(false);
            $table->string('titulo');
            $table->string('tipo');
            $table->string('area_atuacao');
            $table->unsignedBigInteger('organizacao_id');
            $table->string('organizacao_type'); // 'empresa' ou 'ong'
            $table->text('descricao');
            $table->string('estado');
            $table->string('cidade');
            $table->string('formato');
            $table->date('data_inicio');
            $table->date('data_termino')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oportunidades');
    }
};
