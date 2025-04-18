<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleryItems = GalleryItem::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('gallery.index', compact('galleryItems'));
    }
}