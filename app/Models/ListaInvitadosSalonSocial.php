<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListaInvitadosSalonSocial extends Model
{
    protected $table = ['reservacion_salon_social_id', 'nombres', 'apellidos'];

   
    public function reservacionSalonSocial()
    {
        return $this->belongsTo(ReservacionSalonSocial::class, 'reservacion_salon_social_id');
    }
}
