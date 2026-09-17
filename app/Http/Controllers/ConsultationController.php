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
        // Jika ada $doctor_id, cari dokternya. Jika TIDAK ada, set ke null (kosong)
        $selectedDoctor = $doctor_id 
            ? Doctor::with('schedules')->find($doctor_id) 
            : null;

        $allDoctors = Doctor::with('schedules')->get();

        return view('user.services.book_consultation', compact('selectedDoctor', 'allDoctors'));
    }

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
            'booking_date'      => 'required|date|after_or_equal:today',
            'booking_time'      => 'required',
            'complaint'         => 'nullable|string',
            'payment_method'    => 'required|string',
        ]);

        // --- VALIDASI ANTI DOUBLE BOOKING ---
        // Pengecekan HANYA berdasarkan tanggal dan jam yang di-booking oleh user
        $isAlreadyBooked = Consultation::where('doctor_id', $request->doctor_id)
            ->where('booking_date', $request->booking_date)
            ->where('booking_time', $request->booking_time)
            ->whereIn('payment_status', ['Unpaid', 'Paid', 'Success'])
            ->exists();

        if ($isAlreadyBooked) {
            return redirect()->back()
                ->withErrors(['booking_time' => 'Maaf, Dokter tersebut sudah memiliki janji pada tanggal dan jam ini. Silakan pilih jam lain.'])
                ->withInput();
        }
        // ------------------------------------

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

        return redirect()->route('user.consultation.receipt', $consultation->consultation_id);
    }

    // Method Tampil Struk
    public function showReceipt($id)
    {
        $consultation = Consultation::with('doctor')->findOrFail($id);
        return view('user.services.struk_consultation', compact('consultation'));
    }

    public function indexAdmin()
    {
        $consultations = Consultation::with('doctor')->latest()->paginate(10);
        return view('admin.daftar_consultation', compact('consultations'));
    }
}