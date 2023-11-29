<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $materis = Materi::with('mapel', 'user', 'rombel')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data Materi',
            'data' => $materis,
        ], 200);
    }

    public function show(Materi $materi)
    {
        if (!$materi) {
            return response()->json([
                'status' => false,
                'message' => 'Data Kosong',
                'data' => [],
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail Materi ' . $materi->judul_materi,
            'data' => $materi,
        ]);
    }
}
