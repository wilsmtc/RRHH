<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Permission;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
class PermissionsController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::where('user_id', $id)->firstOrFail();
        $user = User::where('id', $id)->firstOrFail();
        $permission->username = $user->username;
        //$user->user;
        //$users = Permission::with('role')->select(['*'])->where('user_id', $id);
       // $user->getAuthPassword();
        return response()->json($permission);
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax())
        {
            
            $permission= Permission::where('user_id', $id)->firstOrFail();
            $permission->user_id = $id;
                if($request->add[0]=='t')
                {
                    $permission->add=1;
                }else{
                    $permission->add=0;
                }
                if($request->edit[0]=='t')
                {
                    $permission->edit=1;
                }else{
                    $permission->edit=0;
                }
                if($request->remove[0]=='t')
                {
                    $permission->remove=1;
                }else{
                    $permission->remove=0;
                }
                $permission->save();
                $user=User::find($id);
        
            Toastr::success('Permisos del usuario '. $user->name.' editado','');
          
        }
        return response()->json(['success'=>'true']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
