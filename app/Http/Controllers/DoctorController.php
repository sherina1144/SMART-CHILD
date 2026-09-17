<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    // Tampilan untuk Admin (Form Tambah + List Dokter)
    public function adminIndex()
    {
        $doctors = Doctor::with('schedules')->get();
        return view('admin.tambah_doctor', compact('doctors'));
    }

    // Proses Simpan Data Dokter dari Admin
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'     => 'required|string|max:150',
            'kategori'         => 'required|in:Dokter Spesialis,Psikolog,Terapis,Konselor Laktasi',
            'spesialisasi'     => 'required|string',
            'foto'             => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'lama_pengalaman'  => 'required|numeric',
            'rating'           => 'required|numeric|between:0,5.0',
            'biaya_konsultasi' => 'required|numeric',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('doctors', 'public');
        }

        $doctor = Doctor::create([
            'user_id'          => auth()->id() ?? 1,
            'nama_lengkap'     => $request->nama_lengkap,
            'kategori'         => $request->kategori,
            'spesialisasi'     => $request->spesialisasi,
            'foto'             => $fotoPath,
            'lama_pengalaman'  => $request->lama_pengalaman,
            'rating'           => $request->rating,
            'biaya_konsultasi' => $request->biaya_konsultasi,
        ]);

        // Simpan jadwal awal jika diisi pada form tambah
        if ($request->filled('day') && $request->filled('start_time') && $request->filled('end_time')) {
            DoctorSchedule::create([
                'doctor_id'  => $doctor->doctor_id,
                'day'        => $request->day,
                'start_time' => $request->start_time,
                'end_time'   => $request->end_time,
                'quota'      => $request->quota ?? 1,
                'is_active'  => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Data dokter berhasil ditambahkan!');
    }

    // Tampilan untuk User
    public function userIndex()
    {
        $doctors = Doctor::with('schedules')->get();
        return view('user.services.doctor_trapis', compact('doctors'));
    }

    // Method untuk menampilkan form edit dengan data dokter yang dipilih
    public function edit($id)
    {
        // Load relasi schedules agar jadwal operasional yang ada ikut terpanggil
        $doctor = Doctor::with('schedules')->findOrFail($id);
        return view('admin.edit_doctor', compact('doctor'));
    }

    // Method untuk memproses update data dokter & jadwal praktiknya
    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $request->validate([
            'nama_lengkap'     => 'required|string|max:150',
            'kategori'         => 'required|in:Dokter Spesialis,Psikolog,Terapis,Konselor Laktasi',
            'spesialisasi'     => 'required|string',
            'foto'             => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'lama_pengalaman'  => 'required|numeric|min:0',
            'rating'           => 'required|numeric|min:0|max:5',
            'biaya_konsultasi' => 'required|numeric|min:0',
            'day'              => 'nullable|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'start_time'       => 'nullable',
            'end_time'         => 'nullable',
        ]);

        // 1. Update Foto Dokter jika ada file baru
        if ($request->hasFile('foto')) {
            if ($doctor->foto && Storage::disk('public')->exists($doctor->foto)) {
                Storage::disk('public')->delete($doctor->foto);
            }
            $doctor->foto = $request->file('foto')->store('doctors', 'public');
        }

        // 2. Update Data Profil Dokter
        $doctor->nama_lengkap     = $request->nama_lengkap;
        $doctor->kategori         = $request->kategori;
        $doctor->spesialisasi     = $request->spesialisasi;
        $doctor->lama_pengalaman = $request->lama_pengalaman;
        $doctor->rating           = $request->rating;
        $doctor->biaya_konsultasi = $request->biaya_konsultasi;
        $doctor->save();

        // 3. Update / Pembaruan Jadwal Praktik Dokter (Jika hari & jam diisi di form edit)
        if ($request->filled('day') && $request->filled('start_time') && $request->filled('end_time')) {
            DoctorSchedule::updateOrCreate(
                [
                    'doctor_id' => $doctor->doctor_id,
                    'day'       => $request->day,
                ],
                [
                    'start_time' => $request->start_time,
                    'end_time'   => $request->end_time,
                    'quota'      => $request->quota ?? 1,
                    'is_active'  => 1,
                ]
            );
        }

        return redirect()->route('admin.doctor.add')->with('success', 'Data dokter & jadwal praktik berhasil diperbarui!');
    }

    // Tampilan Detail Dokter untuk User
    public function show($id)
    {
        $doctor = Doctor::with('schedules')->findOrFail($id);
        return view('user.services.detail_doctor_trapis', compact('doctor'));
    }

    // --- METHOD KELOLA JADWAL TERPISAH ---

    // Simpan Jadwal Praktik Baru
    public function storeSchedule(Request $request)
    {
        $request->validate([
            'doctor_id'  => 'required|exists:doctors,doctor_id',
            'day'        => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'start_time' => 'required',
            'end_time'   => 'required',
            'quota'      => 'required|integer|min:1',
        ]);

        DoctorSchedule::updateOrCreate(
            [
                'doctor_id' => $request->doctor_id,
                'day'       => $request->day,
            ],
            [
                'start_time' => $request->start_time,
                'end_time'   => $request->end_time,
                'quota'      => $request->quota,
                'is_active'  => 1,
            ]
        );

        return redirect()->back()->with('success', 'Jadwal operasional dokter berhasil diperbarui!');
    }

    // Hapus Jadwal Praktik
    public function destroySchedule($id)
    {
        $schedule = DoctorSchedule::findOrFail($id);
        $schedule->delete();

        return redirect()->back()->with('success', 'Jadwal dokter berhasil dihapus!');
    }
}