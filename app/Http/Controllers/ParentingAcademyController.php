<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParentingAcademy;
use App\Models\Webinar;
use App\Models\Newsletter;
use App\Models\Doctor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ParentingAcademyController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SISI USER
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

        $categories = $categoriesFromAcademy
            ->merge($categoriesFromVideo)
            ->unique()
            ->sort()
            ->values();

        if ($request->get('popular') == 'true') {
            $mostPopularCategory = ParentingAcademy::where('status', 'published')
                ->whereNotNull('category')
                ->select('category', DB::raw('count(*) as total'))
                ->groupBy('category')
                ->orderByDesc('total')
                ->value('category');

            if ($mostPopularCategory) {
                $category = $mostPopularCategory;
            }
        }

        // Artikel
        $academiesQuery = ParentingAcademy::where('status', 'published')
            ->where('type', 'article');

        if ($category !== 'Semua Materi') {
            $academiesQuery->where('category', $category);
        }

        $academies = $academiesQuery->latest()->get();

        // Video
        $videosQuery = ParentingAcademy::where('status', 'published')
            ->where('type', 'video');

        if ($category !== 'Semua Materi') {
            $videosQuery->where('category', $category);
        }

        $videos = $videosQuery->latest()->get();

        // Webinar dari tabel webinars
        $webinars = Webinar::orderBy('schedule', 'asc')->get();

        $experts = Doctor::all();

        return view(
            'user.services.parenting_academy',
            compact(
                'academies',
                'videos',
                'webinars',
                'categories',
                'category',
                'experts'
            )
        );
    }

    public function subscribe(Request $request)
    {
        return back()->with(
            'success',
            'Berhasil berlangganan Parenting Academy!'
        );
    }

    public function show($id)
    {
        $academy = ParentingAcademy::where('status', 'published')
            ->where('type', 'article')
            ->findOrFail($id);

        return view(
            'user.services.parenting_academy_detail',
            compact('academy')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SISI ADMIN
    |--------------------------------------------------------------------------
    */

    public function indexAdmin()
    {
        $academies = ParentingAcademy::where('type', 'article')
            ->latest()
            ->get();

        $videos = ParentingAcademy::where('type', 'video')
            ->latest()
            ->get();

        $webinars = Webinar::orderBy('schedule', 'asc')->get();

        $newsletters = Newsletter::latest()->get();

        return view(
            'admin.parenting_academy.index',
            compact('academies', 'videos', 'webinars', 'newsletters')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CRUD ARTIKEL
    |--------------------------------------------------------------------------
    */

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

        $data['thumbnail'] = $request->file('thumbnail')
            ->store('parenting/academies', 'public');

        $data['slug'] = Str::slug($request->title) . '-' . time();
        $data['type'] = 'article';
        $data['instructor'] = '-';
        $data['status'] = 'published';

        ParentingAcademy::create($data);

        return redirect()
            ->route('parenting.index')
            ->with('success', 'Buku panduan berhasil ditambahkan!');
    }

    public function editAcademy($id)
    {
        $academy = ParentingAcademy::findOrFail($id);

        return view(
            'admin.parenting_academy.edit_academy',
            compact('academy')
        );
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

        $data = [
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'link' => $request->link,
        ];

        if ($request->hasFile('thumbnail')) {
            if ($academy->thumbnail) {
                Storage::disk('public')->delete($academy->thumbnail);
            }

            $data['thumbnail'] = $request->file('thumbnail')
                ->store('parenting/academies', 'public');
        }

        $academy->update($data);

        return redirect(url('admin/parenting-academy'))
            ->with('success', 'Buku panduan berhasil diperbarui!');
    }

    public function destroyAcademy($id)
    {
        $academy = ParentingAcademy::findOrFail($id);

        if ($academy->thumbnail) {
            Storage::disk('public')->delete($academy->thumbnail);
        }

        $academy->delete();

        return back()->with(
            'success',
            'Buku panduan berhasil dihapus!'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CRUD VIDEO
    |--------------------------------------------------------------------------
    */

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

        $thumbnailPath = $request->file('thumbnail')
            ->store('parenting/videos', 'public');

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

        return redirect()
            ->route('parenting.index')
            ->with('success', 'Video berhasil ditambahkan ke Parenting Academy!');
    }

    public function editVideo($id)
    {
        $video = ParentingAcademy::where('type', 'video')
            ->findOrFail($id);

        return view(
            'admin.parenting_academy.edit_video',
            compact('video')
        );
    }

    public function updateVideo(Request $request, $id)
    {
        $video = ParentingAcademy::where('type', 'video')
            ->findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'duration' => 'required|string',
            'instructor' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'video_url' => 'required|url',
        ]);

        $data = [
            'title' => $request->title,
            'category' => $request->category,
            'duration' => $request->duration,
            'instructor' => $request->instructor,
            'video_url' => $request->video_url,
        ];

        if ($request->hasFile('thumbnail')) {
            if ($video->thumbnail) {
                Storage::disk('public')->delete($video->thumbnail);
            }

            $data['thumbnail'] = $request->file('thumbnail')
                ->store('parenting/videos', 'public');
        }

        $video->update($data);

        return redirect()
            ->route('parenting.index')
            ->with('success', 'Video panduan berhasil diperbarui!');
    }

    public function destroyVideo($id)
    {
        $video = ParentingAcademy::where('type', 'video')
            ->findOrFail($id);

        if ($video->thumbnail) {
            Storage::disk('public')->delete($video->thumbnail);
        }

        $video->delete();

        return back()->with(
            'success',
            'Video berhasil dihapus!'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CRUD WEBINAR
    |--------------------------------------------------------------------------
    */

    public function createWebinar()
    {
        return view('admin.parenting_academy.create_webinar');
    }

    public function storeWebinar(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'instructor' => 'required|string|max:255',
            'webinar_date' => 'required|date',
            'webinar_time' => 'required|date_format:H:i',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'required|url|max:200',
        ]);

        $imagePath = $request->file('thumbnail')
            ->store('parenting/webinars', 'public');

        $schedule = $validated['webinar_date']
            . ' '
            . $validated['webinar_time'];

        Webinar::create([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'description' => $validated['description'],
            'speaker' => $validated['instructor'],
            'schedule' => $schedule,
            'image' => $imagePath,
            'link' => $validated['link'],
        ]);

        return redirect()
            ->route('admin.parenting.academy.index')
            ->with('success', 'Webinar berhasil ditambahkan!');
    }

    public function editWebinar($id)
    {
        $webinar = Webinar::findOrFail($id);

        return view(
            'admin.parenting_academy.edit_webinar',
            compact('webinar')
        );
    }

    public function updateWebinar(Request $request, $id)
    {
        $webinar = Webinar::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'instructor' => 'required|string|max:255',
            'webinar_date' => 'required|date',
            'webinar_time' => 'required|date_format:H:i',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'required|url|max:200',
        ]);

        $schedule = $validated['webinar_date']
            . ' '
            . $validated['webinar_time'];

        $data = [
            'title' => $validated['title'],
            'category' => $validated['category'],
            'description' => $validated['description'],
            'speaker' => $validated['instructor'],
            'schedule' => $schedule,
            'link' => $validated['link'],
        ];

        if ($request->hasFile('thumbnail')) {
            if ($webinar->image) {
                Storage::disk('public')->delete($webinar->image);
            }

            $data['image'] = $request->file('thumbnail')
                ->store('parenting/webinars', 'public');
        }

        $webinar->update($data);

        return redirect()
            ->route('admin.parenting.academy.index')
            ->with('success', 'Webinar berhasil diperbarui!');
    }

    public function destroyWebinar($id)
    {
        $webinar = Webinar::findOrFail($id);

        if ($webinar->image) {
            Storage::disk('public')->delete($webinar->image);
        }

        $webinar->delete();

        return back()->with(
            'success',
            'Webinar berhasil dihapus!'
        );
    }
}
