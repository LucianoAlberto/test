<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = ['dni', 'numero_ss', 'fecha_comienzo', 'fecha_fin', 'doc_confidencialidad', 'doc_normas', 'doc_prevencion_riesgos',
    'doc_reglamento_interno',];
}
