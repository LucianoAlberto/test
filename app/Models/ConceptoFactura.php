<?php

namespace App\Models;

use App\Models\Factura;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConceptoFactura extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    /**
     * Obtiene las facturas asociados a este concepto.
     */
    public function facturas()
    {
        return $this->belongsToMany(Factura::class);
    }

    /**
     * Obtiene los contratos asociados a este concepto.
     */
    public function contratos()
    {
        return $this->belongsToMany(Contrato::class);
    }
}
