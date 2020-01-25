<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\http\Requests\EditPasswordRequest;
use Brian2694\Toastr\Facades\Toastr;
class ReiniciarPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function update(EditPasswordRequest $request, $id)
    {
        $user = User::FindOrFail($id);
        $user->password = bcrypt($request->password); 
        $user->save();
        Toastr::success('La contraseña del Usuario '. $user->usuario.' Fue Editado',''); 
        return response()->json(['success'=>'true','data'=>$user]);             
    }
}
