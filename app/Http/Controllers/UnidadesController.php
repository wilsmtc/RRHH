<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Unidad;

use Illuminate\Support\Facades\DB;
use DataTables;
use Brian2694\Toastr\Facades\Toastr;
class UnidadesController extends Controller
{

    public function index()
    {
        return view('admin.unidades.index');
    }

    public function listar_unidades ()
    {
        $unidades =  DB::table('unidades')
        ->select('unidades.*')
        ->orderBy('id')
        ->get();

        if(request()->ajax()){
        return Datatables::of($unidades)
         ->rawColumns( ['id','nombre','descripcion','sigla'])
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
            $Unidad = new Unidad();
            $Unidad->nombre = $request->nombre; 
            $Unidad->descripcion = $request->descripcion; 
            $Unidad->sigla = $request->sigla; 
            $Unidad->save();
            return response()->json(['success'=>'true',$Unidad]);
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Unidad = Unidad::find($id);
        return response()->json($Unidad);
    }

    public function edit($id)
    {
        $Unidad = Unidad::find($id);
        return response()->json($Unidad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax())
        {
            $mensaje = "";
            $a = DB::table('unidades')->where('nombre',$request->nombre)->count();
            $nombre = DB::table('unidades')->where([
                    ['id', '=', $id],
                    ['nombre', '=', $request->nombre]
                ])->count();
            if ($a - $nombre == 1)
            {
                $mensaje = $mensaje . "La Unidad: ".$request->nombre ." ya Existe." . "<br/>" ;
            }
            if($mensaje == "" )
            {
                $Unidad = Unidad::FindOrFail($id);
                $Unidad->nombre = $request->nombre;
                $Unidad->descripcion = $request->descripcion;
                $Unidad->sigla = $request->sigla;
                $Unidad->save();

                return response()->json(['success'=>'true', $Unidad]);             
            }else
            {
                return response()->json(['error'=>'true','mensaje'=>$mensaje]);
            }    
        }     
    }


    public function eliminarUnidad (Request $request)
    {
        $Unidad = Unidad::findOrFail($request->id);
        $Unidad->delete();
        return response()->json([$Unidad]); 
    }

    public function destroy($id)
    {
        //
    }
}
