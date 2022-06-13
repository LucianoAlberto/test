<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model

{

    protected $fillable=['tipos_id','users_id','nombre','edad','peligrosa','alergia'];
    use HasFactory;
}
