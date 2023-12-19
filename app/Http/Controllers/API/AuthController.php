<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('username', 'password'))) {
            return response()->json([
                'status' => 'false',
                'message' => 'Login Gagal'
            ], 401);
        }

        $user = User::where('username', $request['username'])->firstOrFail();

        if ($user->level !== 'siswa') {
            return response()->json([
                'status' => 'false',
                'message' => 'Login Gagal'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        $userData = $user->toArray();

        return response()->json([
            'status' => 'true',
            'message' => 'Login Berhasil',
            'data' => $userData,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function show(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'name' => $user->name,
            'username' => $user->username,
            'level' => $user->level,
            'avatar' => $user->avatar,
        ]);
    }


    public function ubahData(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $user->update([
            'name' => $request->name,
        ]);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('avatar', $filename, 'public');
            $user->update([
                'avatar' => $filename,
            ]);
        }

        if ($request->filled('username')) {
            $user->update([
                'username' => $request->username,
            ]);

            $request->user()->currentAccessToken()->delete();
        }
        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            $request->user()->currentAccessToken()->delete();
        }

        return response()->json([
            'message' => 'Ubah Data Berhasil',
            'data' => $user,
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
