<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'abonado', 'pendiente', 'fecha', 'contrato_id', 'referencia'];

    /**
     * Obtiene el cliente asociado a este pago.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * Obtiene los contratos asociados a este pago.
     */
    public function contratos()
    {
        return $this->belongsTo(Contrato::class);
    }
}
