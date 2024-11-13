<?php

namespace App\Http\Controllers\Forapi;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    // Endpoint API untuk registrasi
    public function register(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Membuat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        // Trigger event Registered
        event(new Registered($user));

        // Login user secara otomatis setelah registrasi
        Auth::login($user);

        // Mengembalikan respons JSON
        return response()->json([
            'status' => 'success',
            'message' => 'User registered successfully',
            'user' => $user
        ], 201);
    }
    
    // Endpoint API untuk login
    public function login(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Cek kredensial login
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Berhasil login
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'status' => 'success',
                'message' => 'Login successful',
                'user' => $user,
                'token' => $token
            ], 200);
        }

        // Jika gagal login
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid email or password'
        ], 401);
    }

    // Endpoint API untuk logout
    public function logout(Request $request)
    {
        // Menghapus semua token yang terkait dengan pengguna ini
        $request->user()->tokens()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Logged out successfully'
        ], 200);
    }



    
}
