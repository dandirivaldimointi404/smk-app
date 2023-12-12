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
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('username', $request['username'])->firstOrFail();

        if ($user->level !== 'siswa') {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Hi ' . $user->name . ', welcome to home',
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


    public function edit(Request $request)
    {
        $user = auth()->user();
    
        $updateData = [
            'name' => $request->input('name'),
            'username' => $request->input('username'),
        ];
    
        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->input('password'));
        }
    
        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::delete('avatars/' . $user->avatar);
            }
    
            $avatarBlob = file_get_contents($request->file('avatar')->getRealPath());
            $updateData['avatar'] = $avatarBlob; 
        }
    
        DB::table('users')
            ->where('id', $user->id)
            ->update($updateData);
    
        if ($user->siswa) {
            DB::table('tb_siswa')
                ->where('user_id', $user->id)
                ->update([
                    'nama_siswa' => $request->input('name'),
                ]);
        }
    
        $updatedUser = DB::table('users')->where('id', $user->id)->first();
        $updatedSiswa = DB::table('tb_siswa')->where('user_id', $user->id)->first();
    
        $response = [
            'message' => 'Profile Berhasil Di Update',
            'user' => $updatedUser,
            'siswa' => $updatedSiswa,
        ];
    
        return response()->json($response);
    }
    




    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
