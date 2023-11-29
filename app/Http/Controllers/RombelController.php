<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Rombel;
use Illuminate\Http\Request;

class RombelController extends Controller
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
            $rombel = Rombel::with('guru')->get();
        } elseif ($userLevel == 'guru') {
            $rombel = Rombel::where('nip_id', $user->guru->nip)->with('guru')->get();
        } else {
            return redirect()->route('beranda.index')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        return view('rombel.index', compact('rombel'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::all();
        return view('rombel.create', compact(['guru']));
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
            'nama_kelas' => 'required|string|max:255',
            'nip_id' => 'required|exists:tb_guru,nip',
        ]);

        Rombel::create($ValidatedData);
        return redirect()->route('rombel.index')->with('success', 'Data Berhasil Tersimpan');
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
