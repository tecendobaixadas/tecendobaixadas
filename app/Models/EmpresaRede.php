<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaRede extends Model
{
    use HasFactory;

    protected $table = 'empresa_redes';

    protected $fillable = [
        'empresa_id',
        'rede',
        'link',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
