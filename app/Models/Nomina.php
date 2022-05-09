<?php

namespace App\Models;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nomina extends Model
{
    use HasFactory;

    protected $fillable = ['empleado_id', 'fecha_inicio', 'fecha_fin', 'importe_total', 'importe_pagado', 'fecha_pago'];

    /**
     * Obtiene el empleado asociado a esta nómina.
     */
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
