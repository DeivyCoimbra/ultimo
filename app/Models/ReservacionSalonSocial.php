<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservacionSalonSocial extends Model
{
    use HasFactory;

    protected $table = 'reservaciones_salon_social';

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
        return $this->hasMany(ListaChurrasquera::class,'reservaciones_churrasquera_id');
    }
}