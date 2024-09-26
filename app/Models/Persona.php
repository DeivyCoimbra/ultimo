<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido', 'telefono', 'piso', 'departamento', 'tipo_id'];

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    public function reportes()
    {
        return $this->hasMany(Reporte::class);
    }

    public function reservacionesSalonSocial()
    {
        return $this->hasMany(ReservacionSalonSocial::class);
    }

    public function reservacionesChurrasquera()
    {
        return $this->hasMany(ReservacionChurrasquera::class);
    }
}
