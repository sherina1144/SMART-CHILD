<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactSetting;

class ContactController extends Controller
{
    // Menampilkan halaman Contact Us untuk User
    public function index()
    {
        // Mengambil data pengaturan pertama dari database
        $setting = ContactSetting::first();

        return view('user.contact_us', compact('setting'));
    }

    // Menyimpan pesan yang dikirim user dari form
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);

        Contact::create($request->all());

        return redirect()->route('contact.us')->with('success', 'Pesan Anda berhasil dikirim! Tim kami akan segera menghubungi Anda.');
    }

    // Menampilkan halaman kelola kontak di Admin
    public function adminIndex()
    {
        $setting = ContactSetting::first();
        $messages = Contact::latest()->get();

        return view('admin.contact', compact('setting', 'messages'));
    }

    // Menyimpan/memperbarui pengaturan kontak oleh admin
    public function adminUpdate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'telepon' => 'required|string',
            'whatsapp' => 'required|string',
            'jam_operasional' => 'required|string',
            'lokasi' => 'required|string',
            'maps_embed_url' => 'nullable|string',
        ]);

        // Update atau buat baru jika data setting belum ada sama sekali di database
        $setting = ContactSetting::first();
        if ($setting) {
            $setting->update($request->all());
        } else {
            ContactSetting::create($request->all());
        }

        return redirect()->route('admin.contact')->with('success', 'Informasi kontak berhasil diperbarui!');
    }
}