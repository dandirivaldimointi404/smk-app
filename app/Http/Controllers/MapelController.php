<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Rombel;
use Illuminate\Http\Request;

class MapelController extends Controller
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
            $mapel = Mapel::where('nip_id', $user->guru->nip)->with('guru')->get();
        } else {
            return redirect()->route('beranda.index')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        return view('mapel.index', compact('mapel'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::all();
        $rombel = Rombel::all();
        return view('mapel.create', compact(['guru', 'rombel']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ValidatedData = $request->validate([
            'nama_mapel' => 'required|string|max:255',
            'kelas_id' => 'required|exists:tb_kelas,id_kelas',
            'nip_id' => 'required|exists:tb_guru,nip',
        ]);

        Mapel::create($ValidatedData);
        return redirect()->route('mapel.index')->with('success', 'Data Berhasil Tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
