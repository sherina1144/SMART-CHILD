<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParentingAcademy;
use App\Models\Video;
use App\Models\Newsletter;
use App\Models\Doctor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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

        $categoriesFromAcademy = ParentingAcademy::where('status', 'published')
            ->where('type', 'article')
            ->whereNotNull('category')
            ->pluck('category');

        $categoriesFromVideo = ParentingAcademy::where('status', 'published')
            ->where('type', 'video')
            ->whereNotNull('category')
            ->pluck('category');

        $categories = $categoriesFromAcademy->merge($categoriesFromVideo)->unique()->sort()->values();

        // --- FITUR TOPIC TERPOPULER ---
        if ($request->has('popular') && $request->popular == 'true') {
            $mostPopularCategory = ParentingAcademy::where('status', 'published')
                ->whereNotNull('category')
                ->select('category', DB::raw('count(*) as total'))
                ->groupBy('category')
                ->orderBy('total', 'desc')
                ->value('category');

            if ($mostPopularCategory) {
                $category = $mostPopularCategory;
            }
        }

        // Query Buku Panduan / Artikel
        $academiesQuery = ParentingAcademy::where('status', 'published')->where('type', 'article');
        if ($category && $category !== 'Semua Materi') {
            $academiesQuery->where('category', $category);
        }
        $academies = $academiesQuery->latest()->get();

        // Query Video Panduan
        $videosQuery = ParentingAcademy::where('status', 'published')->where('type', 'video');
        if ($category && $category !== 'Semua Materi') {
            $videosQuery->where('category', $category);
        }
        $videos = $videosQuery->latest()->get();

        // Query Webinar & Kelas Online Mendatang
        $webinarsQuery = ParentingAcademy::where('status', 'published')->where('type', 'webinar');
        if ($category && $category !== 'Semua Materi') {
            $webinarsQuery->where('category', $category);
        }
        $webinars = $webinarsQuery->latest()->get();

        $experts = Doctor::all();

        return view('user.services.parenting_academy', compact('academies', 'videos', 'webinars', 'categories', 'category', 'experts'));
    }

    public function subscribe(Request $request)
    {
        return back()->with('success', 'Berhasil berlangganan Parenting Academy!');
    }

    public function show($id)
    {
        $academy = ParentingAcademy::where('status', 'published')
            ->where('type', 'article')
            ->findOrFail($id);

        return view('user.services.parenting_academy_detail', compact('academy'));
    }

    /*
    |--------------------------------------------------------------------------
    | SISI ADMIN (Backend Parenting Academy Dashboard)
    |--------------------------------------------------------------------------
    */
    public function indexAdmin()
    {
        // Ambil data artikel, video, dan webinar
        $academies = ParentingAcademy::where('type', 'article')->latest()->get();
        $videos = ParentingAcademy::where('type', 'video')->latest()->get();
        $webinars = ParentingAcademy::where('type', 'webinar')->latest()->get();
        $newsletters = Newsletter::latest()->get();

        return view('admin.parenting_academy.index', compact('academies', 'videos', 'webinars', 'newsletters'));
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
            'link' => 'nullable|url',
            'duration' => 'required|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('parenting/academies', 'public');
        }

        $data['slug'] = Str::slug($request->title) . '-' . time();
        $data['type'] = 'article';
        $data['instructor'] = '-';
        $data['status'] = 'published';

        ParentingAcademy::create($data);

        return redirect()->route('parenting.index')->with('success', 'Buku panduan berhasil ditambahkan!');
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
            'link' => 'nullable|url',
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
            'link' => $request->link,
        ]);

        return redirect(url('admin/parenting-academy'))->with('success', 'Buku panduan berhasil diperbarui!');
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
            'type' => 'video',
            'status' => 'published',
        ]);

        return redirect()->route('parenting.index')->with('success', 'Video berhasil ditambahkan ke Parenting Academy!');
    }

    public function editVideo($id)
    {
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

        return redirect()->route('parenting.index')->with('success', 'Video panduan berhasil diperbarui!');
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

    // --- CRUD WEBINAR & KELAS ONLINE ---
    public function createWebinar()
    {
        return view('admin.parenting_academy.create_webinar');
    }

    public function storeWebinar(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'duration' => 'required|string',
            'instructor' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'required|url',
        ]);

        $thumbnailPath = $request->file('thumbnail')->store('parenting/webinars', 'public');

        ParentingAcademy::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'description' => $request->description ?? '-',
            'category' => $request->category,
            'duration' => $request->duration,
            'instructor' => $request->instructor,
            'thumbnail' => $thumbnailPath,
            'link' => $request->link,
            'type' => 'webinar',
            'status' => 'published',
        ]);

        return redirect()->route('parenting.index')->with('success', 'Webinar / Kelas Online berhasil ditambahkan!');
    }

    public function editWebinar($id)
    {
        $webinar = ParentingAcademy::where('type', 'webinar')->findOrFail($id);
        return view('admin.parenting_academy.edit_webinar', compact('webinar'));
    }

    public function updateWebinar(Request $request, $id)
    {
        $webinar = ParentingAcademy::where('type', 'webinar')->findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'duration' => 'required|string',
            'instructor' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'required|url',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($webinar->thumbnail) {
                Storage::disk('public')->delete($webinar->thumbnail);
            }
            $webinar->thumbnail = $request->file('thumbnail')->store('parenting/webinars', 'public');
        }

        $webinar->update([
            'title' => $request->title,
            'category' => $request->category,
            'duration' => $request->duration,
            'instructor' => $request->instructor,
            'link' => $request->link,
            'description' => $request->description ?? $webinar->description,
        ]);

        return redirect()->route('parenting.index')->with('success', 'Webinar berhasil diperbarui!');
    }

    public function destroyWebinar($id)
    {
        $webinar = ParentingAcademy::where('type', 'webinar')->findOrFail($id);
        if ($webinar->thumbnail) {
            Storage::disk('public')->delete($webinar->thumbnail);
        }
        $webinar->delete();

        return back()->with('success', 'Webinar berhasil dihapus!');
    }
}