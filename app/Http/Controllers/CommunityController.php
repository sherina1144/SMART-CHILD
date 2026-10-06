<?php

namespace App\Http\Controllers;

use App\Models\DiscussionGroup;
use App\Models\Thread;
use App\Models\Webinar;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index()
    {
        // Ambil data grup diskusi tahap usia
        $groups = DiscussionGroup::all();

        // Ambil data diskusi hangat beserta data pembuatnya (user)
        $threads = Thread::with('user')->latest()->take(5)->get();

        // Ambil daftar webinar mendatang
        $webinars = Webinar::latest()->get();

        return view('user.community', compact('groups', 'threads', 'webinars'));
    }

    // Method untuk menyimpan thread baru dari user
    public function storeThread(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'content' => 'required|string',
        ]);

        Thread::create([
            'user_id' => auth()->id(), // Mengikat ke user yang sedang login
            'category' => $request->category,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Diskusi/Thread baru berhasil dibuat!');
    }
}