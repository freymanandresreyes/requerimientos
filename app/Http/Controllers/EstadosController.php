<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Estados;

class EstadosController extends Controller
{
    public function nuevo_estado(Request $request)
    {
        $nuevo_estado=$request->nuevo_estado;
        $consulta=estados::all();
        // dd($consulta);
        if($consulta=='[]')
        {
        $nuevo=new estados;
        $nuevo->nombre_estado=$nuevo_estado;
        $nuevo->save();
        $respuesta=1;
        return response()->json($respuesta);
        }
        else
        {
            for ($i = 0; $i <= (count($consulta))-1; $i++) {
                if($consulta[$i]['nombre_estado']==$nuevo_estado)
                {
                    $respuesta=0;
                    return response()->json($respuesta);
                }
                else
                {
                    $nuevo=new estados;
                    $nuevo->nombre_estado=$nuevo_estado;
                    $nuevo->save();
                    $respuesta=1;
                    return response()->json($respuesta);
                }
              }
        }
    }
}
