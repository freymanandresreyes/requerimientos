<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Areas;

class OrdenesController extends Controller
{
    public function vista_generar(Request $request)
    {
        $id_area = $request->user()->id_area;
        $nombre_user = $request->user()->name;
        
        if($id_area!=null)
        {
            $consulta=areas::find($id_area);
            $nombre_area=$consulta->nombre_area;
            $consulta_areas=areas::all();
            return view('ordenes.vista_ordenes',compact('nombre_user','nombre_area','consulta_areas'));
        }
        else
        {
        return redirect('/')->with('error', 'NO ESTAS EN NINGUN AREATO NO PODRAS GENERAR NINGUN REQUERIMIENTO.');
        }
    }
}
