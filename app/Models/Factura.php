<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'fecha_cargo', 'factura'];

    /**
     * Obtiene el cliente asociado a esta factura.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * Obtiene los contratos asociados a esta factura.
     */
    public function contratos()
    {
        return $this->belongsToMany(Contrato::class);
    }

    /**
     * Obtiene el concepto de la factura asociado a esta factura.
     */
    public function concepto_factura()
    {
        return $this->belongsTo(ConceptoFactura::class);
    }
}
