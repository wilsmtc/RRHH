<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\UserRequest;
use App\http\Requests\UserEditRequest;
use App\User;
use App\Role;
use App\Permission;

use Laracast\flash\flash;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use DataTables;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class UsersController extends Controller
{

    public function index()
    {  

        $users = User::orderBy('id','ASC')->get();
        $roles  = Role::orderBy('name','ASC')->pluck('name','id');
        
        $users->each(function ($users)
        {
            $users->permission;

        });
        return view('admin.users.index')
        ->with('users',$users)
        ->with('roles',$roles);
    }

    public function create()
    {
        //
    }
    public function list_user(){

        $users = DB::table('users')->where('username','<>','admin')
        ->join('roles','users.role_id','=','roles.id')
        ->select('users.*', 
        DB::raw('CONCAT(users.name, users.lastname) AS usuario_fullName'),
        'roles.name as rol_nombre')
         ->get();
        //dd($users);
        if(request()->ajax()){
        return Datatables::of($users)
         ->rawColumns(['id','username','name','lastname','email','role_id'])
         ->make(true);
        }else{
            abort('404');
        }

    }
    public function store(UserRequest $request)
    {

        $user = new User($request->all());
        $permission = new Permission($request->all());
        if($request->add == "on" )
            $permission->add = 1;
        else
            $permission->add = 0;
        if($request->edit == "on")
            $permission->edit = 1;    
        else
            $permission->edit = 0;
        if($request->remove == "on")
            $permission->remove = 1;    
        else
            $permission->remove = 0;
        $user->password = bcrypt($request->password);
        $user->save();
        $user = User::limit(1)->orderBy('id','DESC')->get();
        $user_id = $user[0]->id;
        $permission->user_id=$user_id;
        $permission->save();
        Toastr::success('Usuario '. $user[0]->name.' registrado','');
        //return redirect()->route('users.index');
        return response()->json(['success' => 'true','data'=>$request->all()]);
       // }
       // return response()->json(['errors' => $validator->errors()]);
    }

    public function show($id)
    {
        $user = User::find($id);
       // $user->getAuthPassword();
        $user->role;
        $user->permission;
        return response()->json($user);     
    }

    public function edit($id)
    {
        $user = User::find($id);
       // $user->getAuthPassword();
        $user->role;
        $user->permission;
        return response()->json($user);
    }
    public function update(UserEditRequest $request, $id)
    {
        if ($request->ajax())
        {
            $mensaje = "";
            $a = DB::table('users')->where('username',$request->username)->count();
            $usuario = DB::table('users')->where([
                    ['id', '=', $id],
                    ['username', '=', $request->username]
                ])->count();
            $contador = 0;
            if ($a - $usuario == 1)
            {
                $contador = $contador + 1;
                $mensaje = $mensaje . "El Usuario ya Existe." . "<br/>" ;
            }
            $b = DB::table('users')->where('email',$request->email)->count();
            $email = DB::table('users')->where([
                    ['id', '=', $id],
                    ['email', '=', $request->email]
                ])->count();
            if ($b - $email == 1)
            {
                $contador = $contador + 2;
                $mensaje = $mensaje . "El Email ya Existe." . "\n" ;
            }
            if($mensaje == "" )
            {
                $user = User::FindOrFail($id);
                $user->role_id = $request->role_id;
                $user->username = $request->username;
                $user->name = $request->name;
                $user->lastname = $request->lastname;
                $user->email = $request->email;
                //$user->password = bcrypt($request->password); 
                $user->save();
                $mensaje='Usuario '. $user->username.' Fue Editado'; 
                Toastr::success('Usuario '. $user->username.' Fue Editado',''); 
                return response()->json(['success'=>'true','mensaje'=>$mensaje]);             
            }else
            {
                return response()->json(['error'=>'true','cont'=>$contador,'mensaje'=>$mensaje]);
            }    
        }
    }

    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->delete();
        Toastr::error('','Usuario "'. $user->username.'" Fue Eliminado'); 
        return redirect()->route('users.index');
    }
}
