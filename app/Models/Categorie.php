<?php
// app/Models/Categorie.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'descriptif',
    ];

    public function sujets()
    {
        return $this->hasMany(Sujet::class);
    }
}
