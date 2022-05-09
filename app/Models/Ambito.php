<?php

namespace App\Models;

use App\Models\Cliente;
use App\Models\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ambito extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    /**
     * Obtiene los cliente asociados a este ámbito.
     */
    public function clientes()
    {
        return $this->belongsToMany(Cliente::class);
    }

    /**
     * Obtiene los empelados asociados a este ámbito.
     */
    public function empleados()
    {
        return $this->belongsToMany(Empleado::class);
    }
}
