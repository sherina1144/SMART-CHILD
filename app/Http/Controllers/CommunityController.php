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
}