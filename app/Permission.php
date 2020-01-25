<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	protected $table = "permissions";

    protected $fillable = ['user_id','add','edit','remove'];
    
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
