<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    // Tampilan untuk Admin (Form Tambah + List Dokter)
    public function adminIndex()
    {
        $doctors = Doctor::with(['schedules', 'user'])->get();
        
        // Ambil user yang rolenya 'dokter' untuk dipilih saat input data dokter
        $usersDokter = User::where('role', 'dokter')->get();

        return view('admin.tambah_doctor', compact('doctors', 'usersDokter'));
    }

    // Proses Simpan Data Dokter dari Admin
    public function store(Request $request)
    {
        $request->validate([
            'user_id'          => 'required|exists:users,user_id|unique:doctors,user_id',
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
            'user_id'          => $request->user_id,
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

    // Tampilan untuk User (Sudah ditambahkan logika filter kategori)
    public function userIndex(Request $request)
    {
        $query = Doctor::with('schedules');

        // Cek apakah ada parameter kategori dari dropdown filter
        if ($request->has('kategori') && !empty($request->kategori)) {
            $query->where('kategori', $request->kategori);
        }

        $doctors = $query->get();

        return view('user.services.doctor_trapis', compact('doctors'));
    }

    // Method untuk menampilkan form edit dengan data dokter yang dipilih
    public function edit($id)
    {
        $doctor = Doctor::with('schedules')->findOrFail($id);
        
        // 1. Ambil data user yang memiliki role 'dokter'
        $usersDokter = User::where('role', 'dokter')->get();

        // 2. PASTIKAN $usersDokter IKUT DIKIRIM KE VIEW MELALUI COMPACT
        return view('admin.edit_doctor', compact('doctor', 'usersDokter'));
    }

    // Method untuk memproses update data dokter & jadwal praktiknya
    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $request->validate([
            'user_id'           => 'required|exists:users,user_id', // <-- DITAMBAHKAN: Validasi user_id agar wajib diisi dan valid
            'nama_lengkap'      => 'required|string|max:150',
            'kategori'          => 'required|in:Dokter Spesialis,Psikolog,Terapis,Konselor Laktasi',
            'spesialisasi'      => 'required|string',
            'foto'              => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'lama_pengalaman'   => 'required|numeric|min:0',
            'rating'            => 'required|numeric|min:0|max:5',
            'biaya_konsultasi'  => 'required|numeric|min:0',
            'day'               => 'nullable|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'start_time'        => 'nullable',
            'end_time'          => 'nullable',
        ]);

        // 1. Update Foto Dokter jika ada file baru
        if ($request->hasFile('foto')) {
            if ($doctor->foto && Storage::disk('public')->exists($doctor->foto)) {
                Storage::disk('public')->delete($doctor->foto);
            }
            $doctor->foto = $request->file('foto')->store('doctors', 'public');
        }

        // 2. Update Data Profil Dokter (TERMASUK user_id)
        $doctor->user_id           = $request->user_id; // <-- DITAMBAHKAN: Agar user_id ikut tersimpan sesuai pilihan admin
        $doctor->nama_lengkap      = $request->nama_lengkap;
        $doctor->kategori          = $request->kategori;
        $doctor->spesialisasi      = $request->spesialisasi;
        $doctor->lama_pengalaman   = $request->lama_pengalaman;
        $doctor->rating            = $request->rating;
        $doctor->biaya_konsultasi  = $request->biaya_konsultasi;
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

    // Halaman Dashboard Dokter
    public function dashboard()
    {
        // Ambil data dokter berdasarkan user yang sedang login
        $doctor = Doctor::with(['schedules', 'user'])->where('user_id', auth()->id())->first();

        return view('dokter.dashboard', compact('doctor')); 
    }

    // Halaman Daftar Konsultasi Pasien untuk Dokter
    public function consultations()
    {
        // Ambil data dokter berdasarkan user yang sedang login
        $doctor = Doctor::with(['schedules', 'user'])->where('user_id', auth()->id())->first();

        $consultations = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 10);

        if ($doctor) {
            // Ambil konsultasi khusus dokter ini yang statusnya 'Confirmed', 'Completed', atau 'Selesai'
            $consultations = \App\Models\Consultation::where('doctor_id', $doctor->doctor_id)
                ->whereIn('status_konsultasi', ['Confirmed', 'Completed', 'Selesai', 'selesai'])
                ->latest()
                ->paginate(10);
        }

        // Arahkan ke view khusus dokter, BUKAN admin.daftar_consultation
        return view('dokter.consultations', compact('doctor', 'consultations'));
    }

    // Halaman Jadwal Praktik untuk Dokter
    public function schedules()
    {
        // Ambil data dokter berdasarkan user yang sedang login
        $doctor = Doctor::with(['schedules', 'user'])->where('user_id', auth()->id())->first();

        // Tambahkan ini agar variabel $consultations tersedia dan tidak error di view
        $consultations = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 10);

        if ($doctor) {
            $consultations = \App\Models\Consultation::where('doctor_id', $doctor->doctor_id)
                ->whereIn('status_konsultasi', ['Confirmed', 'confirmed'])
                ->latest()
                ->paginate(10);
        }

        // Pastikan view-nya sesuai (apakah masih pakai admin.daftar_consultation atau view baru)
        return view('admin.daftar_consultation', compact('doctor', 'consultations'));
    }

    public function myProfile()
    {
        // Ambil data dokter berdasarkan user yang sedang login beserta relasi schedules dan user-nya
        $doctor = Doctor::with(['schedules', 'user'])->where('user_id', auth()->id())->first();

        // Jika data dokter tidak ditemukan, bisa handle dengan abort atau redirect
        if (!$doctor) {
            return redirect()->back()->with('error', 'Data profil dokter tidak ditemukan.');
        }

        // Tampilkan ke view khusus profil dokter
        return view('auth.profile_dokter', compact('doctor'));
    }

    public function finishConsultation($id)
    {
        $consultation = \App\Models\Consultation::where('consultation_id', $id)->firstOrFail();
        
        $consultation->status_konsultasi = 'Completed'; // Diubah jadi 'Completed' agar cocok dengan standar atau biarkan 'Selesai' tapi sudah di-cover di query atas
        $consultation->save();

        return redirect()->back()->with('success', 'Konsultasi selesai.');
    }

    public function index()
    {
        return $this->dashboard();
    }
}