<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\TugasMasuk;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TugasSiswaController extends Controller
{

    public function index()
    {
        $tugasMasuk = TugasMasuk::all();
        // dd($tugasMasuk);

        return response()->json(['data' => $tugasMasuk], 200);
    }



    public function submitTugas(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $request->validate([
                // 'file_tugasmasuk' => 'required|file|mimes:pdf,doc,docx',
                'status' => '',
                'nilai' => '',
                'tugas_id' => '',
            ]);

            $fileTugasMasuk = $request->file('file_tugasmasuk');
            $tugasMasukFileName = time() . '.' . $fileTugasMasuk->getClientOriginalExtension();
            $storedPath = $fileTugasMasuk->storeAs('tugas', $tugasMasukFileName);

            // Use the model's create method to create a new instance and save it in one step
            $tugasSiswa = TugasMasuk::create([
                'user_id' => $user->id,
                'tugas_id' => $request->tugas_id,
                'file_tugasmasuk' => $storedPath,
                'status' => 'terkirim',
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Tugas submitted successfully.',
                'data' => $tugasSiswa,
            ], 201);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'User is not authenticated',
                'data' => null,
            ], 403);
        }
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'file_tugasmasuk' => 'required|file|mimes:pdf,doc,docx',
            'status' => '',
            'nilai' => '',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        $fileTugasSiswa = $request->file('file_tugasmasuk');
        $tugasFileName = time() . '.' . $fileTugasSiswa->getClientOriginalExtension();
        $storedPath = $fileTugasSiswa->storeAs('tugas', $tugasFileName);
        $validatedData['file_tugasmasuk'] = $storedPath;

        $createdTugasMasuk = TugasMasuk::create($validatedData);

        return response()->json(['message' => 'Tugas berhasil ditambahkan', 'data' => $createdTugasMasuk], 201);
    }

    // public function getTugasSiswa($id_tugas_siswa)
    // {
    //     $user = Auth::user();

    //     if ($user && $user->siswa) {
    //         $tugasSiswa = TugasMasuk::find($id_tugas_siswa);

    //         if ($tugasSiswa) {
    //             return response()->json([
    //                 'status' => true,
    //                 'message' => 'Tugas Siswa Details',
    //                 'data' => $tugasSiswa,
    //             ]);
    //         } else {
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => 'Tugas Siswa not found.',
    //                 'data' => null,
    //             ], 404);
    //         }
    //     } else {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'User is not a student or not authenticated',
    //             'data' => null,
    //         ], 403);
    //     }
    // }
}
