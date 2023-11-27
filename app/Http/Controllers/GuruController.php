<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\JenisKelamin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->level == 'admin') {
            $guru = Guru::with('jeniskelamin', 'user')->get();
            return view('guru.index', compact('guru'));
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
        return view('guru.create', compact(['jenis_kelamin']));
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
            'nip' => 'required|numeric|unique:tb_guru,nip',
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:8',
            'jenis_kelamin_id' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'level' => '',
        ], [
            'nip.unique' => 'NIP sudah terdaftar.',
            'username.unique' => 'Buat Username Lain.',
        ]);


        $user = User::find($request->input('user_id', null));
        if (!$user) {
            $user = new User([
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'password' => Hash::make($request->input('password')),
                'level' => 'guru',
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


        $guru = new Guru([
            'nip' => $request->get('nip'),
            'nama_guru' => $request->get('name'),
            'jenis_kelamin_id' => $request->get('jenis_kelamin_id'),
            'user_id' => $user->id,
        ]);

        $guru->save();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan.');
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
    public function edit(Guru $guru)
    {
        $jenis_kelamin = JenisKelamin::all();
        return view('guru.edit', compact(['guru', 'jenis_kelamin']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nip' => 'required|numeric|unique:tb_guru,nip,' . $guru->nip . ',nip',
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username,' . $guru->user_id,
            'password' => 'nullable|string|min:8',
            'jenis_kelamin_id' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'level' => '',
        ], [
            'nip.unique' => 'NIP sudah terdaftar.',
            'username.unique' => 'Buat Username Lain.',
        ]);

        $user = $guru->user;
        $user->name = $request->input('name');
        $user->username = $request->input('username');

        if ($request->filled('password') && $request->input('password') !== $user->getOriginal('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('public/avatars', $avatarName);
            $user->avatar = $avatarName;
        }

        $user->save();

        $guru->nip = $request->get('nip');
        $guru->nama_guru = $request->get('name');
        $guru->jenis_kelamin_id = $request->get('jenis_kelamin_id');

        $guru->save();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus.');
    }
}
