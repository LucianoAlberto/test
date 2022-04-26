<?php

namespace App\Models;

use App\Models\Falta;
use App\Models\Nomina;
use App\Models\Vacaciones;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = ['dni', 'numero_ss', 'fecha_comienzo', 'fecha_fin', 'doc_confidencialidad', 'doc_normas', 'doc_prevencion_riesgos',
    'doc_reglamento_interno',];

    /**
     * Obtiene las nóminas asociadas a este empleado.
     */
    public function nominas()
    {
        return $this->hasMany(Nomina::class);
    }

    /**
     * Obtiene las faltas asociadas a este empleado.
     */
    public function faltas()
    {
        return $this->hasMany(Falta::class);
    }

    /**
     * Obtiene las vacaciones asociadas a este empleado.
     */
    public function vacacioness()
    {
        return $this->hasMany(Vacaciones::class);
    }
}
