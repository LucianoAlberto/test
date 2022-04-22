<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
