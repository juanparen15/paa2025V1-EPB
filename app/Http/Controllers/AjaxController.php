<?php

namespace App\Http\Controllers;

use App\Clase;
use App\Familia;
use App\Producto;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function obtener_familias(Request $request)
    {
        if ($request->ajax()) {
            try {
                // Mensajes de depuración
                // dd($request->segmento_id);
                $familias = Familia::where('segmento_id', $request->segmento_id)->get();
                return response()->json($familias);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function obtener_clases(Request $request)
    {
        if ($request->ajax()) {
            try {
                $clases = Clase::where('familia_id', $request->familia_id)->get();
                return response()->json($clases);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function obtener_productos(Request $request)
    {
        if ($request->ajax()) {
            try {
                $productos = Producto::where('clase_id', $request->clase_id)->get();
                return response()->json($productos);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }
}
