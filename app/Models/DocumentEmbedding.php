<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentEmbedding extends Model
{
    protected $table = 'document_embeddings';

    protected $fillable = [
        'documento_id',
        'chunk',
        'embedding'
    ];

    protected $casts = [
        'embedding' => 'array',
    ];

    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }
}