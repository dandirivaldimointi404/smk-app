<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Materi;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
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
            $mapels = Mapel::with('guru', 'rombel')->get();
        } elseif ($userLevel == 'guru') {
            $mapels = Mapel::where('nip_id', $user->guru->nip)->with('guru', 'rombel')->get();
        } else {
            return redirect()->route('beranda.index')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
        return view('tugas.index', compact(['mapels']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tugasMapel($id_mapel)
    {
        $mapel = Mapel::findOrFail($id_mapel);
        return view('tugas.create', compact('mapel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_mapel)
    {
        $validatedData = $request->validate([
            'judul_tugas' => 'required',
            'deskripsi' => 'required',
            'batas_waktu' => 'required',
            'file_tugas' => 'required|file|mimes:pdf,doc,docx',
        ]);
        $mapel = Mapel::findOrFail($id_mapel);

        $fileMateri = $request->file('file_tugas');
        $materiName = time() . '.' . $fileMateri->getClientOriginalExtension();

        $storedPath = $fileMateri->storeAs('tugas', $materiName);
        $validatedData['file_tugas'] = $storedPath;

        $tugas = new Tugas();
        $tugas->judul_tugas = $request->judul_tugas;
        $tugas->deskripsi = $request->deskripsi;
        $tugas->batas_waktu = $request->batas_waktu;
        $tugas->file_tugas = $storedPath;
        $tugas->kelas_id = $mapel->kelas_id;
        $tugas->id_mapel = $mapel->id_mapel;
        $tugas->user_id = Auth::user()->id;
        $tugas->save();

        return redirect()->route('tugas.show', $tugas->id_mapel)->with('success', 'Materi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_mapel)
    {

        $mapel = Mapel::findOrFail($id_mapel);
        return view('tugas.show', compact(['mapel']));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tugas $tugas)
    {
        return view('tugas.edit', compact('tugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tugas $tugas)
    {
        $validatedData = $request->validate([
            'judul_tugas' => 'required',
            'deskripsi' => 'required',
            'batas_waktu' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        $tugas->update([
            'judul_tugas' => $request->judul_tugas,
            'deskripsi' => $request->deskripsi,
            'batas_waktu' => $request->batas_waktu,
        ]);

        if ($request->hasFile('file_tugas')) {
            $fileTugas = $request->file('file_tugas');
            $tugasName = time() . '.' . $fileTugas->getClientOriginalExtension();

            $fileTugas->storeAs('public/tugas', $tugasName);

            $validatedData['file_tugas'] = $tugasName;

            $tugas->update([
                'file_tugas' => $tugasName,
            ]);
        }



        return redirect()->route('tugas.show', $tugas->id_mapel)->with('success', 'Materi berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tugas $tugas)
    {
        $tugas->delete();
        return redirect()->back()->with('success', 'Materi berhasil dihapus.');
    }
}
