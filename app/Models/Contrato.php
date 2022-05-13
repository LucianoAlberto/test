<?php

namespace App\Models;

use App\Models\ConceptoFactura;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contrato extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'concepto', 'referencia', 'base_imponible', 'iva', 'irpf', 'total',
    'fecha_firma', 'archivo', 'presupuesto'];

    /**
     * Obtiene el cliente asociados a este contrato.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * Obtiene las facturas asociadas a esta factura.
     */
    public function facturas()
    {
        return $this->belongsToMany(Factura::class);
    }

    /**
     * Obtiene los proyectos asociados a este contrato.
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
     * Obtiene el concepto asociado a este contrato.
     */
    public function concepto()
    {
        return $this->belongsTo(ConceptoFactura::class);
    }
}
