<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\GalleryItem;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestNews = News::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $galleryItems = GalleryItem::where('is_active', true)
            ->take(6)
            ->get();

        return view('home', compact('latestNews', 'galleryItems'));
    }
}