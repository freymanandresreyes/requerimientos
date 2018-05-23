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
        return view('configuraciones.configuraciones',compact('consulta_users','consulta_areas'));
    }

    public function crear_area(Request $request)
    {
        $area=$request->area;
        $lider=$request->lider;
        
        $consulta_area_user=user::where('id_area',$area)->get();
        if($consulta_area_user!='[]')
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
        $consulta=AreaS::find($id);
        dd($consulta);
        // $nombre=$consulta->userArea['name'];
        // dd($nombre);
        $consulta->each(function($consulta){
        $consulta->areaUser;
        });
        dd($consulta);
        return response()->json($consulta);
    }
}
