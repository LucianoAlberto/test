<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConceptoFactura extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    /**
     * Obtiene los contratos asociados a este cliente.
     */
    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }
}
