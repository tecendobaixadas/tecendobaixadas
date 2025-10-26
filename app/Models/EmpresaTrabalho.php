<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaTrabalho extends Model
{
    use HasFactory;

    protected $table = 'empresa_trabalhos';

    protected $fillable = [
        'empresa_id',
        'nome',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
