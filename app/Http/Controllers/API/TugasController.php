<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        $tugas = Tugas::with('mapel', 'user', 'rombel')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data Tugas',
            'data' => $tugas,
        ], 200);
    }

    public function show(Tugas $tugas)
    {
        if ($tugas) {

            return response()->json([
                'status' => true,
                'message' => 'Detail tugas ' . $tugas->judul_tugas,
                'data' => $tugas,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data Kosong',
                'data' => [],
            ]);
        }
    }
}
