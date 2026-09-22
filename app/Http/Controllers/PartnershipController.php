<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partnership;
use Illuminate\Support\Facades\Auth;

class PartnershipController extends Controller
{
    // Menampilkan halaman partnership khusus user yang sedang login
    public function index()
    {
        // Mengambil data partnership berdasarkan user_id yang sedang login saja
        $partnerships = Partnership::where('user_id', Auth::id())->latest()->get();
        return view('user.partnership.tampil_partnership', compact('partnerships'));
    }

    // Menampilkan form pendaftaran
    public function create(Request $request)
    {
        $type = $request->query('type', 'School'); 
        return view('user.partnership.form_partnership', compact('type'));
    }

    // Menyimpan data dengan menyertakan user_id
    public function store(Request $request)
    {
        $request->validate([
            'nama_instansi' => ['required', 'string', 'max:150'],
            'tipe_partner'  => ['required', 'in:School,Business'],
            'kontak_person' => ['required', 'string', 'max:100'],
            'email'         => ['required', 'email', 'max:100'],
            'pesan'         => ['nullable', 'string'],
        ]);

        Partnership::create([
            'user_id'       => Auth::id(), // <-- Menyimpan ID user yang sedang login secara otomatis
            'nama_instansi' => $request->nama_instansi,
            'tipe_partner'  => $request->tipe_partner,
            'kontak_person' => $request->kontak_person,
            'email'         => $request->email,
            'pesan'         => $request->pesan,
        ]);

        return redirect()->route('user.partnership')
                         ->with('success', 'Pendaftaran partnership berhasil dikirim!');
    }

    // [ADMIN] Menampilkan semua daftar partnership yang masuk
    public function adminIndex()
    {
        $partnerships = Partnership::with('user')->latest()->get();
        return view('admin.daftar_partnership', compact('partnerships'));
    }

    // ADMIN Mengubah status partnership (Confirm / Cancel)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => ['required', 'in:Confirmed,Cancelled']
        ]);

        $partnership = Partnership::findOrFail($id);
        $partnership->update([
            'status' => $request->status
        ]);

        return redirect()->route('admin.partnership')->with('success', 'Status partnership berhasil diperbarui!');
    }
}