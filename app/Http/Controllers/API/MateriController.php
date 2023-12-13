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

        $materi = Materi::where('id_mapel', $id_mapel)->with('rombel', 'mapel', 'user', 'user')->get();

        if ($materi->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Belum Memiliki Materi Pelajaran',
                'data' => null,
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail Tugas untuk id_mapel ' . $id_mapel,
            'data' => $materi,
        ]);
    }

    public function showMateri(Materi $id_materi)
    {
        $materi = Materi::where('id_materi', $id_materi->id_materi)->with('rombel', 'mapel', 'user')->first();

        if (!$materi) {
            return response()->json([
                'status' => false,
                'message' => 'Materi not found',
                'data' => null,
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail Materi',
            'data' => $materi,
        ]);
    }

    public function downloadMateri(Materi $id_materi)
    {
        if (!$id_materi) {
            return response()->json([
                'status' => false,
                'message' => 'Materi not found',
                'data' => null,
            ]);
        }

        $file_path = "storage/{$id_materi->file_materi}";

        $external_url = 'https://ef3d-140-213-124-99.ngrok-free.app/storage/';
        $file_path = str_replace(asset('storage'), $external_url, asset($file_path));

        return response()->json([
            'status' => true,
            'message' => 'Detail Materi',
            'data' => [
                'id_materi' => $id_materi->id_materi,
                'title' => $id_materi->judul_materi,
                'file_materi' => $file_path,
            ],
        ]);
    }
}
