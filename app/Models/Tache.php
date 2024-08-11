<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    protected $fillable = ['nom', 'description', 'complexite', 'employe_id','status'];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
