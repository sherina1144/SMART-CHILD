<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Mail\NewsletterWelcomeMail;
use Illuminate\Support\Facades\Mail; // <--- PASTIKAN INI ADA DI ATAS

class NewsletterController extends Controller
{

    public function index()
    {
        // Mengambil data newsletter dari database (misal diurutkan dari yang terbaru)
        $newsletters = Newsletter::latest()->paginate(10);

        // Kirim variabel $newsletters ke view
        return view('admin.newsletter.index', compact('newsletters'));
    }

    public function store(Request $request)
    {
        // 1. Validasi input nama dan email
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:newsletters,email',
        ]);

        // 2. Simpan nama dan email ke database
        Newsletter::create([
            'subject' => $request->subject,
            'content' => $request->content,
            'email' => $request->email, // <-- Pastikan email ikut dimasukkan
        ]);

        // 3. Kirim nama asli ke Mailable
        \Illuminate\Support\Facades\Mail::to($request->email)->send(new \App\Mail\NewsletterWelcomeMail($request->name));
        return back()->with('success', 'Berhasil berlangganan! Silakan cek email kamu.');
    }

    public function destroy($id)
    {
        // Cari data newsletter berdasarkan ID lalu hapus
        $newsletter = Newsletter::findOrFail($id);
        $newsletter->delete();

        return back()->with('success', 'Data newsletter berhasil dihapus.');
    }
}