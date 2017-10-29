<?php

namespace App\Http\Controllers;
use DB;
use App\Viajero;
use Illuminate\Http\Request;

class ViajerosController extends Controller
{
   function obtenerTodo(Request $request) {
   		try {
   			$viajeros = Viajero::all(); 
   			return response()->json($viajeros, 200);
   		}
      catch (Exception $e) {
        return response()->json(['error' => 'Unauthorized'], 401, []);
      }       		
   }

   function crearViajero(Request $request) {
   		if($request->isJson()) {
   			$data = $request->json()->all();
   			$viajero = Viajero::create([
   				'nombre' => $data['nombre'],
          'cedula' => $data['cedula'],
   				'direccion' => $data['direccion'],
          'telefono' => $data['telefono']
   			]);
   			return response()->json($viajero, 200);
   		}
   		return response()->json(['error' => 'Unauthorized'], 401, []);
   }

   public function actualizarViajero(Request $request, $id)
    {
        if ($request->isJson()) {
            try {
                $viajero = Viajero::findOrFail($id);
                $data = $request->json()->all();
                $viajero->nombre = $data['nombre'];
                $viajero->cedula = $data['cedula'];
                $viajero->direccion = $data['direccion'];
                $viajero->telefono = $data['telefono'];             
                $viajero->save();
                return response()->json($viajero, 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No content'], 406);
            }
        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }
    
    public function obtenerViajero(Request $request, $id)
    {
        if ($request->isJson()) {
            try {
              $viajero = Viajero::findOrFail($id);
              return response()->json(['viajero'=>$viajero], 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No content'], 406);
            }
        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }

    public function borrarViajero(Request $request, $id)
    {
        try {
            try {
                $viajero = Viajero::findOrFail($id);
                $viajero->delete();
                return response()->json('Delete success', 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No content'], 406);
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }
}

 