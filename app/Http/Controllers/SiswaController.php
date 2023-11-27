<?php

namespace App\Http\Controllers;

use App\Models\JenisKelamin;
use App\Models\Rombel;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $UserLevel = auth()->user()->level;

        if ($UserLevel == 'admin') {
            $siswa = Siswa::with('jeniskelamin', 'rombel', 'user')->get();
            return view('siswa.index', compact('siswa'));
        } else {
            return redirect()->route('beranda.index')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_kelamin = JenisKelamin::all();
        $rombel = Rombel::all();
        return view('siswa.create', compact(['jenis_kelamin', 'rombel']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|numeric|unique:tb_siswa,nis',
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:8',
            'jenis_kelamin_id' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kelas_id' => 'required|exists:tb_kelas,id_kelas',
            'level' => '',
        ], [
            'nis.unique' => 'NIS sudah terdaftar.',
            'username.unique' => 'Buat Username Lain.',
        ]);


        $user = User::find($request->input('user_id', null));
        if (!$user) {
            $user = new User([
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'password' => Hash::make($request->input('password')),
                'level' => 'siswa',
            ]);
        }

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('public/avatars', $avatarName);
            $user->avatar = $avatarName;
        } else {
            $avatarName = null;
        }

        $user->save();


        $siswa = new Siswa([
            'nis' => $request->get('nis'),
            'kelas_id' => $request->get('kelas_id'),
            'nama_siswa' => $request->get('name'),
            'jenis_kelamin_id' => $request->get('jenis_kelamin_id'),
            'user_id' => $user->id,
        ]);

        $siswa->save();

        return redirect()->route('siswa.index')->with('success', 'Data guru berhasil ditambahkan.');
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
