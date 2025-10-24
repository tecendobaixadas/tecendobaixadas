<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    /**
     * Os campos que podem ser preenchidos em massa.
     */
    protected $fillable = [
        'razao_social',
        'nome_fantasia',
        'cnpj',
        'inscricao_estadual',
        'data_fundacao',
        'logradouro',
        'bairro',
        'estado',
        'cidade',
        'cep',
        'telefone_fixo',
        'email_principal',
        'nome_completo',
        'cpf',
        'cargo',
        'email_contato',
        'modelo_atuacao',
    ];
}
