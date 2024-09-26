<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaChurrasquera extends Model
{
    use HasFactory;

    protected $table = 'lista_churrasquera';

    protected $fillable = [
        'reservacion_id',
        'nombres',
        'apellidos'
    ];

    public function reservacion()
    {
        return $this->belongsTo(ReservacionChurrasquera::class, 'reservacion_id');
    }
}