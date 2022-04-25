<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = ['referencia', 'concepto', 'proveedor_dominio_usuario', 'proveedor_dominio_contrasenha', 'proveedor_hosting_usuario',
    'nombre_dominio', 'proveedor_hosting_contrasenha', 'otros_datos', 'sepa', 'preferencias'];

    /**
     * Obtiene el cliente asociados a este proyecto.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * Obtiene las bases de datos asociadas a este contrato.
     */
    public function basedatoss()
    {
        return $this->hasMany(BaseDatos::class);
    }

    /**
     * Obtiene los dominios asociados a este contrato.
     */
    public function dominios()
    {
        return $this->hasMany(Dominio::class);
    }

    /**
     * Obtiene los emailcorporativos asociados a este contrato.
     */
    public function emailcorporativos()
    {
        return $this->hasMany(EmailCorporativo::class);
    }

    /**
     * Obtiene los accesos asociados a este contrato.
     */
    public function accesos()
    {
        return $this->hasMany(Acceso::class);
    }
}
