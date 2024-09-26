<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaSalonSocial extends Model
{
    use HasFactory;

    protected $table = 'lista_salon_social';

    protected $fillable = [
        'reservacion_id',
        'nombres',
        'apellidos'
    ];

    public function reservacion()
    {
        return $this->belongsTo(ReservacionSalonSocial::class, 'reservacion_id');
    }
}