<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservacionChurrasquera extends Model
{
    use HasFactory;

    protected $table = 'reservaciones_churrasquera';

    protected $fillable = [
        'persona_id',
        'fecha_reservacion',
        'cantidad_invitados'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function listaInvitados()
    {
        return $this->hasMany(ListaInvitadosChurrasquera::class,'reservaciones_churrasquera_id');
    }
}