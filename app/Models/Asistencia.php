<?php

namespace App\Models;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asistencia extends Model
{
    use HasFactory;

    protected $fillable = ['empleado_id', 'archivo', 'fecha_inicio', 'fecha_fin'];

    /**
     * Obtiene los empleados asociados a esta asistencia.
     */
    public function empleados()
    {
        return $this->belongsTo(Empleado::class);
    }
}
