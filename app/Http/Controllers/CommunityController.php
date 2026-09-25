<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommunityGroup;
use App\Models\CommunityThread;
use App\Models\Webinar;

class CommunityController extends Controller // <- BENAR
{
    public function index()
    {
        $groups = CommunityGroup::all();
        $threads = CommunityThread::latest()->take(3)->get();
        $webinars = Webinar::all();

        return view('user.community', compact('groups', 'threads', 'webinars'));
    }

    public function community()
    {
        // Ambil data grup diskusi atau card tahap usia dari database/model
        $groups = CommunityGroup::all(); // atau data array statis jika tidak pakai database

        return view('user.community', compact('groups'));
    }
}