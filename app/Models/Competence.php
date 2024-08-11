<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    protected $fillable = ['nom'];

    public function employes()
    {
        return $this->belongsToMany(Employe::class);
    }
}
