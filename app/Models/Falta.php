<?php

namespace App\Models;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Falta extends Model
{
    use HasFactory;

    protected $fillable = ['empleado_id', 'fecha_falta', 'justificacion', 'notas'];

    /**
     * Obtiene el empleado asociado a esta falta.
     */
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
