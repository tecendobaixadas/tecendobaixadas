<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatIa extends Model
{
    use HasFactory;

    protected $table = 'chat_ias';

    protected $fillable = [
        'user_id',
        'sender',
        'message',
    ];
}
