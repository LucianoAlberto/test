<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseDatos extends Model
{
    use HasFactory;

    protected $fillable = ['proyecto_id', 'nombre_bd', 'host', 'contrasenha'];

    /**
     * Obtiene el proyecto asociado a este contrato.
     */
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }
}
