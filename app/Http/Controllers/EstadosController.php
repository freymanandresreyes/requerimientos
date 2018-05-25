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



    public function listar_estados()
    {
        $consulta_estados=estados::all();
        return response()->json(view('estados.estados_listar', compact('consulta_estados'))->render());
    }



    public function llenar_input(Request $request)
    {
        $estado=$request->estado;
        $consulta=estados::where('id',$estado)->get();
        
        if($consulta=='[]')
        {
        return response()->json(view('estados.input_vacio')->render());
        }
        else
        {
        return response()->json(view('estados.input', compact('consulta'))->render());
        }
    }


    public function guardar_editar_estado(Request $request)
    {
        $nuevo_estado=$request->editar_estado;
        $consulta=estados::all();
        for ($i = 0; $i <= (count($consulta))-1; $i++) {
            if($consulta[$i]['nombre_estado']==$nuevo_estado)
            {
                $respuesta=0;
                return response()->json($respuesta);
            }
            // elseif($consulta[$i]['nombre_estado']!=$nuevo_estado)
            // {
                
            // }
          }
          
                $buscar=$consulta[$i]['id'];
                $nueva_consulta=estados::find($buscar);
                $nueva_consulta->nombre_estado=$nuevo_estado;
                $nueva_consulta->save();
                $respuesta=1;
                return response()->json($respuesta);
    }
}
