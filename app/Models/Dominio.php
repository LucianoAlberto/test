<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dominio extends Model
{
    use HasFactory;

    protected $fillable = ['proyecto_id', 'nombre'];

    /**
     * Obtiene el proyecto asociado a este dominio.
     */
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }
}
