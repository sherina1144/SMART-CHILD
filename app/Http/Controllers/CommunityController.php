<?php

namespace App\Http\Controllers;

use App\Models\DiscussionGroup;
use App\Models\Thread;
use App\Models\Reply;
use App\Models\CommunityThread;
use App\Models\Webinar;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index()
    {
        // Ambil data grup diskusi tahap usia
        $groups = DiscussionGroup::all();

        // Tambahkan withCount('replies') agar Laravel menghitung total komentar secara otomatis
        $threads = Thread::with('user')
            ->withCount('replies') // <-- INI YANG KURANG TADI
            ->latest()
            ->take(3)
            ->get();

        // Ambil daftar webinar mendatang
        $webinars = Webinar::latest()->get();

        return view('user.community', compact('groups', 'threads', 'webinars'));
    }

    // Method untuk menyimpan thread baru dari user
    public function storeThread(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $user = auth()->user();

        \App\Models\Thread::create([
            'user_id' => $user->id, // Menyimpan ID user yang sedang login
            'category' => $request->category,
            'title' => $request->title,
            'content' => $request->content,
            'author_name' => $user->name ?? $user->nama ?? 'Pengguna',
            'author_avatar' => 'default.png',
            'time_ago' => 'Baru saja', // Mengisi default text jika kolom time_ago masih ada & wajib di database
        ]);

        return redirect()->route('community.index')->with('success', 'Diskusi baru berhasil diposting!');
    }

    // Menampilkan halaman detail thread beserta daftar balasan/komentar
    public function show($id)
    {
        $thread = Thread::with(['replies.user'])->findOrFail($id);

        return view('user.community_detail', compact('thread'));
    }

    public function storeReply(Request $request, $threadId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        \App\Models\Reply::create([
            'thread_id' => $threadId,
            'user_id' => auth()->id(), // <-- Pastikan ini ada agar tersimpan ID usernya
            'content' => $request->content,
        ]);

        return back()->with('success', 'Tanggapan berhasil dikirim!');
    }

    public function allThreads()
    {
        $threads = Thread::with('user')->withCount('replies')->latest()->paginate(10);

        return view('user.community_all', compact('threads'));
    }
}