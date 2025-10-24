<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jovem extends Model
{
    use HasFactory;

    /**
     * Os campos que podem ser preenchidos em massa.
     */
    protected $fillable = [
        'nome_completo',
        'nome_social',
        'email',
        'telefone',
        'data_nascimento',
        'genero',
        'orientacao_sexual',
        'raca',
        'situacao_atual',
        'escolaridade',
        'oportunidades',
        'interesse',
        'portador_deficiencia',
        'estado',
        'cidade',
        'portfolio',
    ];

    /**
     * Conversão automática de tipos de dados.
     */
    protected $casts = [
        'data_nascimento' => 'date',
        'portador_deficiencia' => 'boolean',
    ];
}
