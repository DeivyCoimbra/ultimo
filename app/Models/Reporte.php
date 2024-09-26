<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $fillable = ['persona_id', 'descripcion'];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}

