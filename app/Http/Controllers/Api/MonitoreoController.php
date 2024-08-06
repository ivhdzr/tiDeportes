<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Monitoreo;
use Illuminate\Support\Facades\Validator;

class MonitoreoController extends Controller
{
    //
    public function index()
    {
        $monitoreos = Monitoreo::all();

        // if($monitoreos->isEmpty()) {
        //     $data = [
        //         'mensaje' => 'No hay monitoreos registrados',
        //         'status' => 200
        //     ];
        //     return response() -> json($data, 200);
        // }
        $data = [
            'monitoreos' => $monitoreos,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jugador_id' => 'required|integer|exists:jugadores,id',
            'freq_cardiaca' => 'required|integer'
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $monitoreo = Monitoreo::create([
            'jugador_id' => $request->jugador_id,
            'freq_cardiaca' => $request->freq_cardiaca
        ]);
        if(!$monitoreo) {
            $data = [
                'message' => 'Error al enviar monitoreo',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'monitoreo' => $monitoreo,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($id) {
        $monitoreo = Monitoreo::find($id);
        if(!$monitoreo) {
            $data = [
                'message' => 'No se encontró el monitoreo',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'monitoreo' => $monitoreo,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
