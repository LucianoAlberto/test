<?php

namespace App\Models;

use App\Models\Falta;
use App\Models\Ambito;
use App\Models\Nomina;
use App\Models\Practica;
use App\Models\Vacacion;
use App\Models\Asistencia;
use App\Models\RolTrabajo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = ['dni', 'numero_ss', 'fecha_comienzo', 'fecha_fin', 'doc_confidencialidad', 'doc_normas', 'doc_prevencion_riesgos',
    'doc_reglamento_interno', 'vacaciones_total'];

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
    public function vacaciones()
    {
        return $this->hasMany(Vacacion::class);
    }

    /**
     * Obtiene las(la) prácticas(práctica) asociada a este empleado.
     */
    public function practica()
    {
        return $this->hasOne(Practica::class);
    }

    /**
     * Obtiene los ámbitos asociados a este empleado.
     */
    public function ambitos()
    {
        return $this->belongsToMany(Ambito::class);
    }

    /**
     * Obtiene los ámbitos asociados a este empleado.
     */
    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }

    public function scopeSinAmbito($query)
    {
        return $query->doesntHave('ambitos')->paginate(10);
    }

    public function scopeConAmbito($query, $ambito)
    {
        return $query->whereHas('ambitos', function($q) use($ambito){
            $q->where('ambito_id', $ambito);
        })
        ->paginate(10);
    }
}
