<?php

namespace App\Models;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Practica extends Model
{
    use HasFactory;

    protected $fillable = ['empleado_id', 'instituto', 'localidad', 'provincia', 'tutor_practicas', 'fecha_inicio', 'fecha_fin', 'convenio',
'doc_confidencialidad'];

    /**
     * Obtiene el empleado asociado a estas prácticas.
     */
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}

