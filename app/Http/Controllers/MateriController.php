<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $userLevel = $user->level;

        if ($userLevel == 'admin') {
            $mapel = Mapel::with('guru', 'rombel')->get();
        } elseif ($userLevel == 'guru') {
            $mapel = Mapel::where('nip_id', $user->guru->nip)->with('guru','rombel')->get();
        } else {
            return redirect()->route('beranda.index')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
        return view('materi.index', compact(['mapel']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_mapel = session('id_mapel');
        $kelas_id = session('kelas_id');

        return view('materi.create', compact('id_mapel', 'kelas_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_materi' => 'required',
            'deskripsi' => 'required',
            'pertemuan' => 'required|numeric',
            'kelas_id' => 'required|numeric',
            'user_id' => '',
            'id_mapel' => 'required|numeric',
            'file_materi' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        $fileMateri = $request->file('file_materi');
        $materiName = time() . '.' . $fileMateri->getClientOriginalExtension();

        $storedPath = $fileMateri->storeAs('materi', $materiName);
        $validatedData['file_materi'] = $storedPath;

        $createdMateri = Materi::create($validatedData);

        return redirect()->route('materi.show', $createdMateri->id_mapel)->with('success', 'Materi berhasil ditambahkan.');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $materi)
    {
        session(['id_mapel' => $materi->id_mapel, 'kelas_id' => $materi->kelas_id]);

        $materimapel = Materi::where('id_mapel', $materi->id_mapel)->get();
        return view('materi.show', compact(['materi', 'materimapel']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi)
    {
        return view('materi.edit', compact('materi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materi $materi)
    {
        $validatedData = $request->validate([
            'judul_materi' => 'required',
            'deskripsi' => 'required',
            'pertemuan' => 'required|numeric',
            'kelas_id' => 'required|numeric',
            'user_id' => '',
            'id_mapel' => 'required|numeric',
            'file_materi' => 'file|mimes:pdf,doc,docx',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        if ($request->hasFile('file_materi')) {
            $fileMateri = $request->file('file_materi');
            $materiName = time() . '.' . $fileMateri->getClientOriginalExtension();

            $fileMateri->storeAs('public/materi', $materiName);

            $validatedData['file_materi'] = $materiName;
        }

        $materi->update($validatedData);

        return redirect()->route('materi.show', $materi->id_mapel)->with('success', 'Materi berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        $materi->delete();
        return redirect()->route('materi.show', $materi->id_mapel)->with('success', 'Materi berhasil dihapus.');
    }
}
