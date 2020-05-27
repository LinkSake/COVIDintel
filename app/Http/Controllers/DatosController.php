<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatosController extends ValidarDatosController
{
    public function list(){
        $datos = DB::select('CALL leerDatos');
        return view('datos/listado',['dato'=> $datos]);
    }

    public function new(){
        return view('datos/detalle');
    }

    public function create(Request $request){
        $temp = $this->valueToBool($request->input('temp'));
        $tos = $this->valueToBool($request->input('tos'));
        $obs = $this->validateString($request->input('obs'));
        $fecha = $this->validateDatetime($request->input('fecha'));
        $id_us_or = $this->validateInt($request->input('id_us_or'));
        $result = DB::select('CALL crearNuevoDato(?,?,?,?,?)', array($temp,$tos,$obs,$fecha,$id_us_or));
        return redirect()->action('DatosController@list');
    }

    public function edit($id){
        $dato = DB::table('datos_biometricos')->where('id_dat_bio','=',$id)->get();
        return view('datos/detalle',['dato'=>$dato]);
    }

    public function update(Request $request){
        $id = $request->input('id');
        $temp = $this->valueToBool($request->input('temp'));
        $tos = $this->valueToBool($request->input('tos'));
        $obs = $this->validateString($request->input('obs'));
        $fecha = $this->validateDatetime($request->input('fecha'));
        $id_us_or = $this->validateInt($request->input('id_us_or'));
        $result = DB::select('CALL editarDato(?,?,?,?,?,?)', array($id,$temp,$tos,$obs,$fecha,$id_us_or));
        return redirect()->action('DatosController@list');
    }

    public function remove($id){
        $dato = DB::table('datos_biometricos')->where('id_dat_bio','=',$id)->get();
        return view('datos/eliminar',['dato'=>$dato]);
    }

    public function delete(Request $request){
        $id = $request->input('id');
        $result = DB::select('CALL eliminarDato(?)',array($id));
        return redirect()->action('DatosController@list');
    }
}
