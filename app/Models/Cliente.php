<?php

namespace App\Models;

use App\Models\Ambito;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function scopeFiltro($query, $anho)
    {
        return $query->where('anho_contable', '>', $anho)->paginate(10);
    }
}
