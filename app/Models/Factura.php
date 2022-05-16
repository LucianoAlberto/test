<?php

namespace App\Models;

use App\Models\Cliente;
use App\Models\Contrato;
use App\Models\ConceptoFactura;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'fecha_cargo', 'factura', 'referencia_contrato'];

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
    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }

    /**
     * Obtiene el concepto de la factura asociado a esta factura.
     */
    public function concepto_factura()
    {
        return $this->belongsToMany(ConceptoFactura::class);
    }
}
