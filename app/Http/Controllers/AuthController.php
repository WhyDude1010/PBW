<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 1. Menampilkan Halaman Register
    public function showRegister()
    {
        return view('auth.register'); 
    }

    // 2. Memproses Register (Menggabungkan Nama Depan+Belakang & Enkripsi Password)
    public function prosesRegister(Request $request)
    {
        // Validasi inputan wajib disesuaikan dengan atribut 'name' di form HTML temanmu
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|unique:pelanggans,email',
            'phone' => 'required|string|max:15',
            'password' => 'required|min:8',
        ]);

        // Gabungkan first_name dan last_name menjadi satu untuk kolom 'nama' di database
        $namaLengkap = $request->first_name . ' ' . $request->last_name;

        // Simpan ke database dengan password terenkripsi Hash::make
        Pelanggan::create([
            'nama' => $namaLengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password otomatis
            'no_hp' => $request->phone,
        ]);

        // Jika berhasil, lempar ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('sukses', 'Account created successfully! Please sign in.');
    }

    // 3. Menampilkan Halaman Login
    public function showLogin()
    {
        return view('auth.login');
    }

    // 4. Memproses Login & Mengatur Session Pelanggan
    public function prosesLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cari pelanggan berdasarkan email di database
        $pelanggan = Pelanggan::where('email', $request->email)->first();

        // Cek apakah akun ada dan password cocok dengan database terenkripsi
        if ($pelanggan && Hash::check($request->password, $pelanggan->password)) {
            // Buat session login di sistem browser laptop user
            session([
                'isLogin' => true,
                'id_pelanggan' => $pelanggan->id_pelanggan,
                'nama' => $pelanggan->nama,
                'email' => $pelanggan->email
            ]);

            // Jika sukses login, lempar ke halaman dashboard utama
            return redirect()->route('dashboard')->with('sukses', 'Welcome back, ' . $pelanggan->nama);
        }

        // Jika salah, balikkan ke halaman login dengan pesan error
        return redirect()->back()->withErrors(['gagal' => 'Wrong email or password!']);
    }

    // 5. Proses Logout (Menghapus Session)
    public function logout()
    {
        session()->flush(); // Hapus semua data login pelanggans
        return redirect()->route('login')->with('sukses', 'Logged out successfully.');
    }
}