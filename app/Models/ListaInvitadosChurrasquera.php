<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaInvitadosChurrasqueras extends Model
{
    use HasFactory;

    protected $fillable = ['reservacion_churrasquera_id', 'nombres', 'apellidos'];

    public function reservacionChurrasqueras()
    {
        return $this->belongsTo(ReservacionChurrasqueras::class);
    }
}
