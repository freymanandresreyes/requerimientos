<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Areas;

class AreasController extends Controller
{
    public function areas()
    {
        $consulta_users=user::all();
        $consulta_areas=Areas::all();
        $consulta_areas->each(function($consulta_areas){
        $consulta_areas->userArea;
        });
        return view('areas.areas',compact('consulta_users','consulta_areas'));
    }

    public function crear_area(Request $request)
    {
        $area=$request->area;
        $lider=$request->lider;
        
        $consulta_area_user=user::find($lider);
        if($consulta_area_user->id_area!=null)
        {
            $respuesta=0;
            return response()->json($respuesta);
        }
        else
        {
            $nueva_area=new areas;
            $nueva_area->nombre_area=$area;
            $nueva_area->id_user=$lider;
            $nueva_area->save();
            $id_area=$nueva_area->id;

            
            $consulta_user_area=User::find($lider);
            $consulta_user_area->id_area=$id_area;
            $consulta_user_area->save();

            $respuesta=1;
            return response()->json($respuesta);
        }
    }

    public function editar_area(Request $request)
    {
        $id=$request->id;
        $consulta_area=Areas::find($id);
        $id_user=$consulta_area->id_user;
        $consulta_user=User::all();
        // dd($consulta_area,$consulta_user);
        return response()->json(view('areas.parciales.editar_area', compact('consulta_area','consulta_user'))->render());
    }

    public function guardar_editar(Request $request)
    {
        $nombre_area=$request->nombre_area;
        $encargado=$request->encargado;
        $nuevo_nombre=$request->nuevo_nombre;

        $consulta_area_user=user::where('id_area',$nombre_area)
                                ->where('id',$encargado)->get();
        // dd($consulta_area_user);
        $consulta_area=Areas::find($nombre_area);
        
        if($consulta_area_user!="[]")
        {
            $respuesta=0;
            return response()->json($respuesta);
        }
        else
        {
            // dd("hola");
            $consulta_area->nombre_area=$nuevo_nombre;
            $consulta_area->id_user=$encargado;
            $id_area=$consulta_area->id;
            // dd($id_area);
            // dd($consulta_area_user['id_area']);
            $consulta_area->save();
            
            $consulta_user=user::find($encargado);
            // dd($consulta_user);
            $consulta_user->id_area=$id_area;
            // $consulta_area_user->id_area=$id_area;
            $consulta_user->save();
            $respuesta=1;
            return response()->json($respuesta);
        }
    }
}
