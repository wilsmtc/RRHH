<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";

    protected $fillable = [
        'id','role_id', 'username','name','lastname','email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function role()
    {
        return $this->belongsTo('App\Role');
    }
    public function permission()
    {
        return $this->hasOne('App\Permission');
    }
    public function checkout()
    {
        return $this->hasOne('App\Checkout');
    }
}
