<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Mail\NewsletterWelcomeMail;
use Illuminate\Support\Facades\Mail; // <--- PASTIKAN INI ADA DI ATAS

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi input nama dan email
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:newsletters,email',
        ]);

        // 2. Simpan nama dan email ke database
        Newsletter::create([
            'name' => $request->name, // <--- Pastikan ini ada
            'email' => $request->email,
        ]);

        // 3. Kirim nama asli ke Mailable
        \Illuminate\Support\Facades\Mail::to($request->email)->send(new \App\Mail\NewsletterWelcomeMail($request->name));
        return back()->with('success', 'Berhasil berlangganan! Silakan cek email kamu.');
    }
}