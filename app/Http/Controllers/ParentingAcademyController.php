<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParentingAcademy;
use App\Models\Video;
use App\Models\Newsletter;
use App\Models\Doctor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

        // Mengambil daftar kategori unik dari tabel tunggal ParentingAcademy berdasarkan tipe 'article' dan 'video'
        $categoriesFromAcademy = ParentingAcademy::where('status', 'published')
            ->where('type', 'article')
            ->whereNotNull('category')
            ->pluck('category');

        $categoriesFromVideo = ParentingAcademy::where('status', 'published')
            ->where('type', 'video')
            ->whereNotNull('category')
            ->pluck('category');

        $categories = $categoriesFromAcademy->merge($categoriesFromVideo)->unique()->sort()->values();

        // Query untuk Artikel (Courses) dipanggil dari ParentingAcademy dengan type 'article'
        $coursesQuery = ParentingAcademy::where('status', 'published')->where('type', 'article');
        if ($category && $category !== 'Semua Materi') {
            $coursesQuery->where('category', $category);
        }
        $courses = $coursesQuery->latest()->get();

        // Query untuk Video dipanggil dari ParentingAcademy dengan type 'video'
        $videosQuery = ParentingAcademy::where('status', 'published')->where('type', 'video');
        if ($category && $category !== 'Semua Materi') {
            $videosQuery->where('category', $category);
        }
        $videos = $videosQuery->latest()->get();

        // Data dokter/expert
        $experts = Doctor::all();

        return view('user.services.parenting_academy', compact('courses', 'videos', 'categories', 'category', 'experts'));
    }

    public function subscribe(Request $request)
    {
        return back()->with('success', 'Berhasil berlangganan Parenting Academy!');
    }

    /*
    |--------------------------------------------------------------------------
    | SISI ADMIN (Backend Parenting Academy Dashboard)
    |--------------------------------------------------------------------------
    */
    public function indexAdmin()
    {
        // Ambil data yang tipenya article untuk tabel Buku Panduan
        $academies = ParentingAcademy::where('type', 'article')->latest()->get();

        // Ambil data yang tipenya video dari tabel yang sama (ParentingAcademy)
        $videos = ParentingAcademy::where('type', 'video')->latest()->get();

        // 2. Ambil data newsletter terbaru
        $newsletters = Newsletter::latest()->get();

        // 3. Tambahkan $newsletters ke dalam compact
        return view('admin.parenting_academy.index', compact('academies', 'videos', 'newsletters'));
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
            'category' => 'required|string',
            'description' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'nullable|url', // Validasi untuk link artikel/panduan
        ]);

        $data = $request->all();

        // Upload thumbnail jika ada
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('parenting/academies', 'public');
        }

        // Set slug dan type default jika belum ada
        $data['slug'] = Str::slug($request->title) . '-' . time();
        $data['type'] = 'article'; // atau disesuaikan dengan form kamu

        // Berikan nilai default kosong untuk duration jika berupa artikel
        $data['duration'] = $request->duration ?? null;
        $data['link'] = $request->link ?? null;

        ParentingAcademy::create($data);

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
            'category' => 'required|string',
            'duration' => 'required|string',
            'instructor' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'video_url' => 'required|url',
        ]);

        $thumbnailPath = $request->file('thumbnail')->store('parenting/videos', 'public');

        ParentingAcademy::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'description' => $request->description ?? '-',
            'category' => $request->category,
            'duration' => $request->duration,
            'instructor' => $request->instructor,
            'thumbnail' => $thumbnailPath,
            'video_url' => $request->video_url,
            'type' => 'video', // <-- PASTIKAN BARIS INI ADA DI DALAM storeVideo
            'status' => 'published',
        ]);

        return redirect()->route('admin.parenting.index')->with('success', 'Video berhasil ditambahkan ke Parenting Academy!');
    }

    public function editVideo($id)
    {
        // Ubah dari Video:: menjadi ParentingAcademy dengan filter type video
        $video = ParentingAcademy::where('type', 'video')->findOrFail($id);
        return view('admin.parenting_academy.edit_video', compact('video'));
    }

    public function updateVideo(Request $request, $id)
    {
        $video = ParentingAcademy::where('type', 'video')->findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
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
            'category' => $request->category,
            'duration' => $request->duration,
            'instructor' => $request->instructor,
            'video_url' => $request->video_url,
        ]);

        return redirect()->route('admin.parenting.index')->with('success', 'Video panduan berhasil diperbarui!');
    }

    public function destroyVideo($id)
    {
        $video = ParentingAcademy::where('type', 'video')->findOrFail($id);
        if ($video->thumbnail) {
            Storage::disk('public')->delete($video->thumbnail);
        }
        $video->delete();

        return back()->with('success', 'Video berhasil dihapus!');
    }
}