<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user && $user->siswa) {
            $materis = Mapel::where('kelas_id', $user->siswa->kelas_id)->with('rombel','guru')->get();
            return response()->json([
                'status' => true,
                'message' => 'Data Materi',
                'data' => $materis,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'User is not a student or not authenticated',
                'data' => null,
            ], 403);
        }

        // $user = Auth::user();

        // if ($user && $user->siswa) {
        //     $materis = Materi::where('kelas_id', $user->siswa->kelas_id)->with('mapel','user','rombel')->get();
        //     return response()->json([
        //         'status' => true,
        //         'message' => 'Data Materi',
        //         'data' => $materis,
        //     ], 200);
        // } else {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'User is not a student or not authenticated',
        //         'data' => null,
        //     ], 403);
        // }
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
