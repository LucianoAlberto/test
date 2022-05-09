<?php

namespace App\Models;

use App\Models\Cliente;
use App\Models\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RolTrabajo extends Model
{
    use HasFactory;

    protected $fillable = ['rol'];

    /**
     * Obtiene los cliente asociados a este rol.
     */
    public function clientes()
    {
        return $this->belongsToMany(Cliente::class);
    }

    /**
     * Obtiene los empelados asociados a este rol.
     */
    public function empleados()
    {
        return $this->belongsToMany(Empleado::class);
    }
}
