<?php

namespace App\Http\Controllers;
use DB;
use App\Origen;
use Illuminate\Http\Request;

class OrigenesController extends Controller
{
   function obtenerTodo(Request $request) {
   		try {
   			$origenes = Origen::all(); 
   			return response()->json($origenes, 200);
   		}
      catch (Exception $e) {
        return response()->json(['error' => 'Unauthorized'], 401, []);
      }       		
   }

   function crearOrigen(Request $request) {
   		if($request->isJson()) {
   			$data = $request->json()->all();
   			$origen = Origen::create([
   				'codigo' => $data['origen']['codigo'],
          'nombre' => $data['origen']['nombre'],
   				'descripcion' => $data['origen']['descripcion']
   			]);
   			return response()->json($origen, 200);
   		}
   		return response()->json(['error' => 'Unauthorized'], 401, []);
   }

   public function actualizarOrigen(Request $request, $id)
    {
        if ($request->isJson()) {
            try {
                $origen = Origen::findOrFail($id);
                $data = $request->json()->all();
                $origen->codigo = $data['origen']['codigo'];
                $origen->nombre = $data['origen']['nombre'];
                $origen->descripcion = $data['origen']['descripcion'];           
                $origen->save();
                return response()->json($origen, 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No content'], 406);
            }
        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }
    
    public function obtenerOrigen(Request $request, $id)
    {
        if ($request->isJson()) {
            try {
              $origen = Origen::findOrFail($id);
              return response()->json(['origen'=>$origen], 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No content'], 406);
            }
        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }

    public function borrarOrigen(Request $request, $id)
    {
        try {
            try {
                $origen = Origen::findOrFail($id);
                $origen->delete();
                return response()->json('Delete success', 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No content'], 406);
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }
}

 