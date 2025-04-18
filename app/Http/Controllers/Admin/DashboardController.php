<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\GalleryItem;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $newsCount = News::count();
        $galleryCount = GalleryItem::count();

        return view('admin.dashboard', compact('newsCount', 'galleryCount'));
    }
}