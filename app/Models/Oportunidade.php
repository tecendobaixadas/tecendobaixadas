<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oportunidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'tipo',
        'area_atuacao',
        'organizacao_responsavel',
        'descricao',
        'estado',
        'cidade',
        'formato',
        'data_inicio',
        'data_termino',
        'status',
    ];
}
