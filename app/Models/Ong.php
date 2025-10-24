<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ong extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_organizacao',
        'cnpj',
        'natureza_juridica',
        'data_fundacao',
        'area_atuacao',
        'modelo_atuacao',
        'logradouro',
        'bairro',
        'estado',
        'cidade',
        'cep',
        'telefone_fixo',
        'email_principal',
        'site',
        'nome_completo_responsavel',
        'cpf_responsavel',
        'cargo_responsavel',
        'email_contato',
    ];

    protected $casts = [
        'data_fundacao' => 'date',
    ];
}
