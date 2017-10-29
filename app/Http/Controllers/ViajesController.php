<?php

namespace App\Http\Controllers;
use DB;
use App\Viaje;
use Illuminate\Http\Request;

class ViajesController extends Controller
{
   function obtenerTodo(Request $request) {
   		try {
   			$viajes = Viaje::all(); 
   			return response()->json($viajes, 200);
   		}
      catch (Exception $e) {
        return response()->json(['error' => 'Unauthorized'], 401, []);
      }       		
   }

   function crearViaje(Request $request) {
   		if($request->isJson()) {
   			$data = $request->json()->all();
   			$viaje = Viaje::create([
          'viajero_id' => $data['viaje']['viajero_id'],
          'destino_id' => $data['viaje']['destino_id'],
          'origen_id' => $data['viaje']['origen_id'],
   				'cod_viaje' => $data['viaje']['cod_viaje'],
          'num_plazas' => $data['viaje']['num_plazas'],
   				'fecha_realizacion' => $data['viaje']['fecha_realizacion'],
          'descripcion' => $data['viaje']['descripcion']
   			]);
   			return response()->json($viaje, 200);
   		}
   		return response()->json(['error' => 'Unauthorized'], 401, []);
   }

   public function actualizarViaje(Request $request, $id)
    {
        if ($request->isJson()) {
            try {
                $viaje = Viaje::findOrFail($id);
                $data = $request->json()->all();
                $viaje->viajero_id = $data['viaje']['viajero_id'];
                $viaje->destino_id = $data['viaje']['destino_id'];
                $viaje->origen_id = $data['viaje']['origen_id'];
                $viaje->cod_viaje = $data['viaje']['cod_viaje'];
                $viaje->num_plazas = $data['viaje']['num_plazas'];
                $viaje->fecha_realizacion = $data['viaje']['fecha_realizacion'];
                $viaje->descripcion = $data['viaje']['descripcion'];             
                $viaje->save();
                return response()->json($viaje, 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No content'], 406);
            }
        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }
    
    public function obtenerViaje(Request $request, $id)
    {
        if ($request->isJson()) {
            try {
              $viaje = Viaje::findOrFail($id);
              return response()->json(['viaje'=>$viaje], 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No content'], 406);
            }
        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }

    public function borrarViaje(Request $request, $id)
    {
        try {
            try {
                $viaje = Viaje::findOrFail($id);
                $viaje->delete();
                return response()->json('Delete success', 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No content'], 406);
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }
}

 