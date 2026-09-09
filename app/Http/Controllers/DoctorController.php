<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    // Tampilan untuk Admin (Form Tambah + List Dokter)
    public function adminIndex()
    {
        $doctors = Doctor::all();
        return view('admin.tambah_doctor', compact('doctors'));
    }

    // Proses Simpan Data Dokter dari Admin
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:150',
            'kategori' => 'required|in:Dokter Spesialis,Psikolog,Terapis,Konselor Laktasi',
            'spesialisasi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'lama_pengalaman' => 'required|numeric',
            'rating' => 'required|numeric|between:0,5.0',
            'biaya_konsultasi' => 'required|numeric',
            'jadwal_praktik' => 'nullable|string',
        ]);

        // Upload Foto
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('doctors', 'public');
        }

        // Simpan ke Database
        Doctor::create([
            'user_id' => auth()->id() ?? 1, // Default user_id jika belum menggunakan Auth
            'nama_lengkap' => $request->nama_lengkap,
            'kategori' => $request->kategori,
            'spesialisasi' => $request->spesialisasi,
            'foto' => $fotoPath,
            'lama_pengalaman' => $request->lama_pengalaman,
            'rating' => $request->rating,
            'biaya_konsultasi' => $request->biaya_konsultasi,
            'jadwal_praktik' => $request->jadwal_praktik,
        ]);

        return redirect()->back()->with('success', 'Data dokter berhasil ditambahkan!');
    }

    // Tampilan untuk User
        public function userIndex()
    {
        $doctors = Doctor::all();
        return view('user.services.doctor_trapis', compact('doctors'));
    }

    // Method untuk menampilkan form edit dengan data dokter yang dipilih
        public function edit($id)
        {
            $doctor = Doctor::findOrFail($id); // Mencari data berdasarkan primary key (doctor_id / id)
            return view('admin.edit_doctor', compact('doctor'));
        }

        // Method untuk memproses update data ke database
        public function update(Request $request, $id)
        {
            $doctor = Doctor::findOrFail($id);

            $request->validate([
                'nama_lengkap'     => 'required|string|max:150',
                'kategori'         => 'required|in:Dokter Spesialis,Psikolog,Terapis,Konselor Laktasi',
                'spesialisasi'     => 'required|string',
                'foto'             => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Nullable: foto tidak wajib diganti
                'lama_pengalaman' => 'required|numeric|min:0',
                'rating'           => 'required|numeric|min:0|max:5',
                'biaya_konsultasi' => 'required|numeric|min:0',
                'jadwal_praktik'   => 'nullable|string',
            ]);

            // Jika admin mengunggah foto baru
            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada
                if ($doctor->foto && Storage::disk('public')->exists($doctor->foto)) {
                    Storage::disk('public')->delete($doctor->foto);
                }
                
                // Simpan foto baru
                $doctor->foto = $request->file('foto')->store('doctors', 'public');
            }

            // Update field lainnya
            $doctor->nama_lengkap     = $request->nama_lengkap;
            $doctor->kategori         = $request->kategori;
            $doctor->spesialisasi     = $request->spesialisasi;
            $doctor->lama_pengalaman = $request->lama_pengalaman;
            $doctor->rating           = $request->rating;
            $doctor->biaya_konsultasi = $request->biaya_konsultasi;
            $doctor->jadwal_praktik   = $request->jadwal_praktik;

            $doctor->save();

            return redirect()->route('admin.doctor.add')->with('success', 'Data dokter berhasil diperbarui!');
        }

        // Method untuk menghapus data dokter beserta foto dari storage
        public function destroy($id)
        {
            $doctor = Doctor::findOrFail($id);

            // Hapus file foto dari public storage jika ada
            if ($doctor->foto && Storage::disk('public')->exists($doctor->foto)) {
                Storage::disk('public')->delete($doctor->foto);
            }

            // Hapus data dari database
            $doctor->delete();

            return redirect()->route('admin.doctor.add')->with('success', 'Data dokter berhasil dihapus!');
        }

        // Tampilan Detail Dokter untuk User
        public function show($id)
        {
            $doctor = Doctor::findOrFail($id);
            // Mengarahkan ke file resources/views/user/services/detail_doctor_trapis.blade.php
            return view('user.services.detail_doctor_trapis', compact('doctor'));
        }
}