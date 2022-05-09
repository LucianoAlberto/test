<?php

namespace App\Models;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacacion extends Model
{
    use HasFactory;

    protected $fillable = ['fecha_inicio', 'fecha_fin'];

    /**
     * Obtiene el empleado asociados a estas vacaciones.
     */
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
