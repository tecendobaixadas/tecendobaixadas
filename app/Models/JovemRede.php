<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JovemRede extends Model
{
    use HasFactory;

    protected $table = 'jovem_redes';

    protected $fillable = [
        'jovem_id',
        'rede',
        'link',
    ];

    public function jovem()
    {
        return $this->belongsTo(Jovem::class);
    }
}
