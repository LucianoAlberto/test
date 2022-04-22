<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailCorporativo extends Model
{
    use HasFactory;

    protected $fillable = ['proyecto_id', 'email', 'contrasenha', 'ruta_acceso'];

   /**
     * Obtiene el proyecto a este contrato.
     */
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }
}
