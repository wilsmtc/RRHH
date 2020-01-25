<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
	protected $table = "personal";

    protected $fillable = ['unidad_id','nombre','apellido','ci','celular','cargo','curriculum'];
}
