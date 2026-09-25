<?php

namespace App\Http\Controllers;

use App\Models\ParentingAcademy;

class SmartRecommendationController extends Controller
{
    public function index()
    {
        $articles = ParentingAcademy::where('status', 'published')
            ->latest()
            ->take(4)
            ->get();

        return view('user.development.smart_recommendation', compact('articles'));
    }
}