<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParentingAcademy; // Model untuk Buku Panduan / Artikel
use App\Models\Video;            // Model untuk Video Rekomendasi
use App\Models\Doctor;           // Model untuk Dokter/Pakar (jika diperlukan)
use Illuminate\Support\Facades\Storage;

class ParentingAcademyController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SISI USER (Frontend Parenting Academy)
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        $category = $request->get('category', 'Semua Materi');

        // Ambil kategori unik untuk tombol filter dinamis di bagian atas
        $categories = ParentingAcademy::where('status', 'published')
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category');

        // Bagian Atas: Buku Panduan / Artikel (Difilter berdasarkan kategori)
        $query = ParentingAcademy::where('status', 'published');
        if ($category && $category !== 'Semua Materi') {
            $query->where('category', $category);
        }
        $courses = $query->latest()->get();

        // Bagian Bawah: Video Rekomendasi (Tampil konsisten semua)
        $videos = Video::latest()->get();

        $experts = Doctor::all();

        return view('user.services.parenting_academy', compact('courses', 'videos', 'categories', 'category', 'experts'));
    }

    public function subscribe(Request $request)
    {
        // Logika subscribe newsletter/membership jika ada
        return back()->with('success', 'Berhasil berlangganan Parenting Academy!');
    }


    /*
    |--------------------------------------------------------------------------
    | SISI ADMIN (Backend Parenting Academy Dashboard)
    |--------------------------------------------------------------------------
    */
    public function indexAdmin()
    {
        $academies = ParentingAcademy::latest()->get();
        $videos = Video::latest()->get();

        // Mengarahkan ke satu folder view admin yang terpusat
        return view('admin.parenting_academy.index', compact('academies', 'videos'));
    }

    // --- CRUD BUKU PANDUAN / ARTIKEL ---
    public function createAcademy()
    {
        return view('admin.parenting_academy.create_academy');
    }

    public function storeAcademy(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $thumbnailPath = $request->file('thumbnail')->store('parenting/academies', 'public');

        ParentingAcademy::create([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'thumbnail' => $thumbnailPath,
            'status' => 'published',
        ]);

        return redirect()->route('admin.parenting.index')->with('success', 'Buku panduan berhasil ditambahkan!');
    }

    public function editAcademy($id)
    {
        $academy = ParentingAcademy::findOrFail($id);
        return view('admin.parenting_academy.edit_academy', compact('academy'));
    }

    public function updateAcademy(Request $request, $id)
    {
        $academy = ParentingAcademy::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($academy->thumbnail) {
                Storage::disk('public')->delete($academy->thumbnail);
            }
            $academy->thumbnail = $request->file('thumbnail')->store('parenting/academies', 'public');
        }

        $academy->update([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.parenting.index')->with('success', 'Buku panduan berhasil diperbarui!');
    }

    public function destroyAcademy($id)
    {
        $academy = ParentingAcademy::findOrFail($id);
        if ($academy->thumbnail) {
            Storage::disk('public')->delete($academy->thumbnail);
        }
        $academy->delete();

        return back()->with('success', 'Buku panduan berhasil dihapus!');
    }


    // --- CRUD VIDEO REKOMENDASI ---
    public function createVideo()
    {
        return view('admin.parenting_academy.create_video');
    }

    public function storeVideo(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|string',
            'instructor' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'video_url' => 'required|url',
        ]);

        $thumbnailPath = $request->file('thumbnail')->store('parenting/videos', 'public');

        Video::create([
            'title' => $request->title,
            'duration' => $request->duration,
            'instructor' => $request->instructor,
            'thumbnail' => $thumbnailPath,
            'video_url' => $request->video_url,
        ]);

        return redirect()->route('admin.parenting.index')->with('success', 'Video panduan berhasil ditambahkan!');
    }

    public function editVideo($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.parenting_academy.edit_video', compact('video'));
    }

    public function updateVideo(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|string',
            'instructor' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'video_url' => 'required|url',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($video->thumbnail) {
                Storage::disk('public')->delete($video->thumbnail);
            }
            $video->thumbnail = $request->file('thumbnail')->store('parenting/videos', 'public');
        }

        $video->update([
            'title' => $request->title,
            'duration' => $request->duration,
            'instructor' => $request->instructor,
            'video_url' => $request->video_url,
        ]);

        return redirect()->route('admin.parenting.index')->with('success', 'Video panduan berhasil diperbarui!');
    }

    public function destroyVideo($id)
    {
        $video = Video::findOrFail($id);
        if ($video->thumbnail) {
            Storage::disk('public')->delete($video->thumbnail);
        }
        $video->delete();

        return back()->with('success', 'Video berhasil dihapus!');
    }
}