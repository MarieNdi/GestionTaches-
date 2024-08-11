<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $fillable = ['nom', 'email'];

    public function taches()
    {
        return $this->hasMany(Tache::class);
    }

    public function competences()
    {
        return $this->belongsToMany(Competence::class);
    }
}
