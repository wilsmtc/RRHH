<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Personal;
use App\Ciudad;
use App\Unidad;

use Illuminate\Support\Facades\DB;
use DataTables;
use Brian2694\Toastr\Facades\Toastr;
class PersonalController extends Controller
{

    public function index()
    {
        $ciudades = Ciudad::orderBy('id','ASC')->get();
        $unidades = Unidad::orderBy('id','ASC')->get();
        return view('admin.personal.index')
                ->with('ciudades',$ciudades)
                ->with('unidades',$unidades);
    }

    public function get_allciudades()
    {
        $ciudades =  DB::table('ciudades')
        ->orderBy('id','ASC')
        ->get();
        return response()->json($ciudades);
    }    

    public function get_allunidades()
    {
        $unidades =  DB::table('unidades')
        ->orderBy('id','ASC')
        ->get();
        return response()->json($unidades);
    }

    public function listar_personal ()
    {
        $personal =  DB::table('personal as p')
        ->join('ciudades as c','c.id','=','p.ciudad_id')
        ->join('unidades as u','u.id','=','p.unidad_id')        
        ->select('p.*',
            DB::raw("CONCAT(p.nombre,' ',p.apellido) AS personal_nombre"),
                'c.abreviacion','u.nombre as nombre_unidad')
        ->orderBy('p.id')
        ->get();
        //dd($personal);
        if(request()->ajax()){
        return Datatables::of($personal)
         ->rawColumns( ['id','nombre','ci','celular','cargo','nombre_unidad','curriculum'])
         ->make(true);
        }else{
            abort('404');
        }
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        if ($request->ajax())
        {
            $Personal = new Personal();
            $Personal->nombre = $request->nombre;
            $Personal->apellido = $request->apellido;
            $Personal->ci = $request->ci;
            $Personal->celular = $request->celular;
            $Personal->cargo = $request->cargo;
            $Personal->unidad_id = $request->unidad_id;
            $Personal->ciudad_id = $request->ciudad_id;
            $Personal->curriculum = "NO";
            $Personal->save();
            return response()->json(['success'=>'true',$Personal]);
        } 
    }


    public function show($id)
    {
        $Personal = Personal::find($id);
        return response()->json($Personal);
    }


    public function edit($id)
    {
        $Personal = DB::table('personal as p')
        ->join('unidades as u','u.id','=','p.unidad_id')
        ->join('ciudades as c','c.id','=','p.ciudad_id')
        ->select('p.*',
                'u.id as unidad_id',
                'c.id as ciudad_id')
        ->where('p.id',$id)
        ->get();

        return response()->json($Personal);
    }


    public function update(Request $request, $id)
    {
        $Personal = Personal::FindOrFail($id);
        $Personal->nombre = $request->nombre;
        $Personal->apellido = $request->apellido;
        $Personal->ci = $request->ci;
        $Personal->celular = $request->celular;
        $Personal->cargo = $request->cargo;
        $Personal->unidad_id = $request->unidad_id;
        $Personal->ciudad_id = $request->ciudad_id;
        $Personal->save();
        return response()->json(['success'=>'true', $Personal]);             
    }

    public function eliminarUnidad (Request $request)
    {
        $Personal = Personal::findOrFail($request->id);
        $Personal->delete();
        return response()->json([$Personal]); 
    }

    public function destroy($id)
    {
        //
    }
}
