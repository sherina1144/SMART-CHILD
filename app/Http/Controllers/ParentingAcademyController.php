<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParentingAcademy;
use App\Models\Doctor;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ParentingAcademyController extends Controller
{
    // --- SISI USER: Tampilkan daftar Parenting Academy ---
    public function index()
    {
        $academies = ParentingAcademy::where('status', 'published')->latest()->get();
        $courses = $academies;
        $videos = $academies;

        // Ambil data dokter/expert jika ada, atau gunakan data kosong agar tidak error
        $experts = Doctor::all();

        return view('user.services.parenting_academy', compact('academies', 'courses', 'videos', 'experts'));
    }
    // --- SISI ADMIN: Tampilkan daftar untuk dikelola ---
    public function indexAdmin()
    {
        $academies = ParentingAcademy::latest()->get();
        return view('admin.parenting_academy.index', compact('academies'));
    }

    // --- SISI ADMIN: Form tambah materi baru ---
    public function create()
    {
        return view('admin.parenting_academy.create');
    }

    // --- SISI ADMIN: Simpan data baru ke database ---
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category' => 'nullable|string|max:100',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'video_url' => 'nullable|url',
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('parenting-thumbnails', 'public');
        }

        ParentingAcademy::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'description' => $request->description,
            'category' => $request->category,
            'thumbnail' => $thumbnailPath,
            'video_url' => $request->video_url,
            'status' => 'published',
        ]);

        return redirect()->route('admin.parenting.index')->with('success', 'Materi Parenting Academy berhasil ditambahkan!');
    }

    // --- SISI ADMIN: Form edit materi ---
    public function edit($id)
    {
        $academy = ParentingAcademy::findOrFail($id);
        return view('admin.parenting_academy.edit', compact('academy'));
    }

    // --- SISI ADMIN: Update data ke database ---
    public function update(Request $request, $id)
    {
        $academy = ParentingAcademy::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category' => 'nullable|string|max:100',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'video_url' => 'nullable|url',
        ]);

        $thumbnailPath = $academy->thumbnail;
        if ($request->hasFile('thumbnail')) {
            // Hapus gambar lama jika ada
            if ($academy->thumbnail && Storage::disk('public')->exists($academy->thumbnail)) {
                Storage::disk('public')->delete($academy->thumbnail);
            }
            $thumbnailPath = $request->file('thumbnail')->store('parenting-thumbnails', 'public');
        }

        $academy->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'category' => $request->category,
            'thumbnail' => $thumbnailPath,
            'video_url' => $request->video_url,
        ]);

        return redirect()->route('admin.parenting.index')->with('success', 'Materi Parenting Academy berhasil diperbarui!');
    }

    // --- SISI ADMIN: Hapus data ---
    public function destroy($id)
    {
        $academy = ParentingAcademy::findOrFail($id);

        if ($academy->thumbnail && Storage::disk('public')->exists($academy->thumbnail)) {
            Storage::disk('public')->delete($academy->thumbnail);
        }

        $academy->delete();

        return redirect()->route('admin.parenting.index')->with('success', 'Materi berhasil dihapus!');
    }
}