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
        'organizacao_id',
        'organizacao_type',
        'descricao',
        'estado',
        'cidade',
        'formato',
        'data_inicio',
        'data_termino',
        'status',
    ];

    protected $casts = [
        'data_inicio' => 'date',
        'data_termino' => 'date',
    ];

    // Polimórfico para acessar Empresa ou Ong
    public function organizacao()
    {
        return $this->morphTo(__FUNCTION__, 'organizacao_type', 'organizacao_id');
    }
}
