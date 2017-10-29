<?php

namespace App\Http\Controllers;
use DB;
use App\Destino;
use Illuminate\Http\Request;

class DestinosController extends Controller
{
   function obtenerTodo(Request $request) {
   		try {
   			$origenes = Destino::all(); 
   			return response()->json($origenes, 200);
   		}
      catch (Exception $e) {
        return response()->json(['error' => 'Unauthorized'], 401, []);
      }       		
   }

   function crearDestino(Request $request) {
   		if($request->isJson()) {
   			$data = $request->json()->all();
   			$destino = Destino::create([
   				'codigo' => $data['codigo'],
          'nombre' => $data['nombre'],
   				'descripcion' => $data['direccion']
   			]);
   			return response()->json($destino, 200);
   		}
   		return response()->json(['error' => 'Unauthorized'], 401, []);
   }

   public function actualizarDestino(Request $request, $id)
    {
        if ($request->isJson()) {
            try {
                $destino = Destino::findOrFail($id);
                $data = $request->json()->all();
                $destino->codigo = $data['codigo'];
                $destino->nombre = $data['nombre'];
                $destino->descripcion = $data['descripcion'];           
                $destino->save();
                return response()->json($destino, 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No content'], 406);
            }
        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }
    
    public function obtenerDestino(Request $request, $id)
    {
        if ($request->isJson()) {
            try {
              $destino = Destino::findOrFail($id);
              return response()->json(['destino'=>$destino], 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No content'], 406);
            }
        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }

    public function borrarDestino(Request $request, $id)
    {
        try {
            try {
                $destino = Destino::findOrFail($id);
                $destino->delete();
                return response()->json('Delete success', 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No content'], 406);
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }
}

 