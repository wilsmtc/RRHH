<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Personal;
use App\Archivo;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
class ArchivosController extends Controller
{

    public function store(Request $request)
    { 
        //Manipulacion de archivoss
        $verificar = $this->verificarExistencia($request->id);
        if($verificar)
        {
            $archivo = DB::table('archivos')
                    ->where('personal_id','=',$request->id)
                    ->get();
            $path = public_path() . '/documentos/curriculum/';    
            $path .= $archivo[0]->url;
            unlink($path);
        }


        $error = false;
        if($request->file('image'))
        {
            //$Personal = Personal::FindOrFail($request->id);
            $file = $request->file('image');
            $userName = trim(str_replace(' ', '', auth()->user()->username));
            $nameFile = trim($userName) .'_'.time().'.'.$file->getClientOriginalExtension();
            $path = public_path() . '/documentos/curriculum/';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file->move($path,$nameFile);           
        }else
        {
            $error = true;
        }

        if(!$error)
        {
            $Personal = Personal::FindOrFail($request->id);
            $Personal->curriculum = "SI";
            $Personal->save();
            if($verificar)
            {
                $archivo_id = DB::table('archivos')
                    ->where('personal_id','=',$request->id)
                    ->get();
                $Archivo = Archivo::FindOrFail($archivo_id[0]->id);
                $Archivo->url = $nameFile;
                $Archivo->save();
                $mensaje ="Archivo Actualizado";
            }else
            {
                $Archivo = new Archivo();
                $Archivo->url = $nameFile;
                $Archivo->personal_id = $request->id;
                $Archivo->save();
                $mensaje ="Archivo Registrado";           
            }


            Toastr::success('',$mensaje);
            return redirect()->route('personal.index');
        }else
        {
            Toastr::error('','Usted Seleccion un Archivo incorrecto para este Registro');
            return redirect()->route('personal.index');
        }

    }
    public function verificarExistencia($id)
    {
        $ver = DB::table('archivos')
                ->where('personal_id', '=', $id)->exists();
        return $ver;
    }

    public function getDownload($id)
    {
         $archivo_id = DB::table('archivos')
                    ->where('personal_id','=',$id)
                    ->get();
        $Archivo = Archivo::FindOrFail($archivo_id[0]->id);
        //dd($Archivo);
        $file= public_path(). "/documentos/curriculum/" .$Archivo->url;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        return response()->download($file, 'Curriculum.pdf', $headers);
    }


}
