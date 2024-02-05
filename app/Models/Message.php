<?php
// app/Models/Message.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sujet_id',
        'contenu',
        'photo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sujet()
    {
        return $this->belongsTo(Sujet::class);
    }
}
