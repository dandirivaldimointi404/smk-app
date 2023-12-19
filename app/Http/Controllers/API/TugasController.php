<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user && $user->siswa) {
            $materis = Mapel::where('kelas_id', $user->siswa->kelas_id)->with('rombel', 'guru')->get();
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
    }

    public function show(Mapel $mapel)
    {
        $id_mapel = $mapel->id_mapel;

        $tugas = Tugas::where('id_mapel', $id_mapel)->with('rombel', 'mapel', 'user')->get();

        if ($tugas->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Belum Memiliki Tugas',
                'data' => null,
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail Tugas untuk id_mapel ' . $id_mapel,
            'data' => $tugas,
        ]);
    }

    // public function show(Tugas $tugas)
    // {
    //     if ($tugas) {

    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Detail tugas ' . $tugas->judul_tugas,
    //             'data' => $tugas->with('user', 'rombel', 'mapel')->first(),
    //         ]);
    //     } else {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Data Kosong',
    //             'data' => [],
    //         ]);
    //     }
    // }

}
