<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    // Menampilkan halaman Form Booking
    public function create($doctor_id = null)
    {
        // Jika ada doctor_id, ambil data dokternya. Jika tidak ada, ambil dokter pertama sebagai default
        $selectedDoctor = $doctor_id ? Doctor::findOrFail($doctor_id) : Doctor::first();
        $allDoctors = Doctor::all(); // Untuk opsi ganti dokter jika diperlukan

        return view('user.services.book_consultation', compact('selectedDoctor', 'allDoctors'));
    }

    // Memproses data simpan booking
    // Memproses data simpan booking
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id'         => 'required|exists:doctors,doctor_id',
            'child_name'        => 'required|string|max:150',
            'parent_name'       => 'required|string|max:150',
            'child_age'         => 'required|numeric|min:0',
            'child_gender'      => 'required|in:Laki-laki,Perempuan',
            'phone_number'      => 'required|string|max:20',
            'email'             => 'required|email|max:100',
            'address'           => 'required|string',
            'consultation_type' => 'required|in:Online,Offline',
            'booking_date'      => 'required|date',
            'booking_time'      => 'required',
            'complaint'         => 'nullable|string',
            'payment_method'    => 'required|string',
        ]);

        $consultation = Consultation::create([
            'user_id'           => auth()->id() ?? 1,
            'doctor_id'         => $request->doctor_id,
            'child_name'        => $request->child_name,
            'parent_name'       => $request->parent_name,
            'child_age'         => $request->child_age,
            'child_gender'      => $request->child_gender,
            'phone_number'      => $request->phone_number,
            'email'             => $request->email,
            'address'           => $request->address,
            'consultation_type' => $request->consultation_type,
            'booking_date'      => $request->booking_date,
            'booking_time'      => $request->booking_time,
            'complaint'         => $request->complaint,
            'payment_method'    => $request->payment_method,
            'payment_status'    => 'Unpaid',
            'status_konsultasi' => 'Scheduled',
        ]);

        // Kirim nilai primary key consultation_id ke route
        return redirect()->route('user.consultation.receipt', $consultation->consultation_id);
    }

    // Method Tampil Struk
    public function showReceipt($id)
    {
        // Mencari data berdasarkan consultation_id
        $consultation = Consultation::with('doctor')->findOrFail($id);

        return view('user.services.struk_consultation', compact('consultation'));
    }

    public function indexAdmin()
    {
        // Mengambil semua data konsultasi diurutkan dari yang terbaru
        $consultations = Consultation::latest()->paginate(10);

        return view('admin.daftar_consultation', compact('consultations'));
    }
}