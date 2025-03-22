<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    public function exercices()
    {
        return $this->hasMany(Exercice::class);
    }

    public function rapports()
{
    return $this->hasMany(Rapport::class);
}
}