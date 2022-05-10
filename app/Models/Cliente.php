<?php

namespace App\Models;

use App\Models\Ambito;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Scopes\ActiveScope;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellidos', 'dni', 'anho_contable', 'direccion_fiscal', 'domicilio', 'nombre_comercial',
    'nombre_sociedad', 'cif', 'cuenta_bancaria', 'n_tarjeta', 'email', 'telefono'];

    /**
     * Obtiene los contratos asociados a este cliente.
     */
    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }

    /**
     * Obtiene las facturas asociadas a este cliente.
     */
    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }

    /**
     * Obtiene los proyectos asociados a este cliente.
     */
    public function proyectos()
    {
        return $this->hasMany(Proyecto::class);
    }

    /**
     * Obtiene los pagos asociados a este cliente.
     */
    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }

    /**
     * Obtiene los ámbitos asociados a este cliente.
     */
    public function ambitos()
    {
        return $this->belongsToMany(Ambito::class);
    }

    public function scopeSinAmbitos($query)
    {
        return $query->doesntHave('ambitos')->paginate(10);
    }

    public function scopeConAmbitos($query, $ambito)
    {
        return $query->whereHas('ambitos', function($q, $ambito) {
            $q->where('ambito_id', $ambito);
        })
        ->paginate(10);
    }
}
