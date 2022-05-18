<?php

namespace App\Models;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ControlAsistencia extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'concepto', 'referencia', 'base_imponible', 'iva', 'irpf', 'total',
    'fecha_firma', 'archivo', 'presupuesto'];

    /**
     * Obtiene los empleados asociados a esta asistencia.
     */
    public function empleados()
    {
        return $this->belongsTo(Empleado::class);
    }
}
