<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            if ($role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } elseif ($role === 'doctor') {
                return redirect()->intended('/doctor/dashboard');
            }

            // Ubah bagian ini menjadi /home untuk user biasa
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // Tampilkan form register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses simpan register ke database
    public function register(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        // Simpan ke database
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', 
        ]);

        // Otomatis login setelah berhasil register
        Auth::login($user);

        // Arahkan ke beranda
        return redirect()->intended('/');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // Tampilkan halaman profil user
    public function showProfile()
    {
        $user = Auth::user();

        // Cek apakah user punya role admin atau cek berdasarkan field role/tipe akun di database 
        if ($user->role === 'admin') { 
            return view('auth.profile_admin', compact('user')); // Tampilan khusus admin
        }
        return view('auth.profile_user', compact('user'));  // Jika user biasa
    }

    // Tampilkan halaman form edit profil
    public function editProfile()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return view('auth.edit_profile_admin', compact('user'));
        }

        return view('auth.edit_profile_user', compact('user'));
    }

    // Proses update profil & upload foto
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'username' => ['nullable', 'string', 'max:50', 'unique:users,username,' . $user->user_id . ',user_id'],
            'no_hp' => ['nullable', 'string', 'max:20'],
            'alamat' => ['nullable', 'string'],
            'kota' => ['nullable', 'string', 'max:100'],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'], // Maksimal 2MB
        ]);

        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->kota = $request->kota;

        // Handle Upload Foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto && file_exists(storage_path('app/public/' . $user->foto))) {
                unlink(storage_path('app/public/' . $user->foto));
            }
            // Simpan foto baru ke folder storage/app/public/profile_photos
            $path = $request->file('foto')->store('profile_photos', 'public');
            $user->foto = $path;
        }

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui!');
    }
}