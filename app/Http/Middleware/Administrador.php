<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Closure;
use Session;
use Brian2694\Toastr\Facades\Toastr;
class Administrador
{
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle(Request $request, Closure $next,$route)
    {
        if($this->auth->user()->role->name =='Miembro')
        {           
            Toastr::error('NO TIENES PERMISOS DE ADMINISTRADOR PARA INGRESAR A ESTE SITIO');  
            return redirect()->to('/Home');
        }
        return $next($request);
    }
}

