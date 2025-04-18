<?php

namespace App\Observers;

use App\Models\GalleryItem;
use Illuminate\Support\Facades\Storage;

class GalleryItemObserver
{
    public function deleted(GalleryItem $galleryItem)
    {
        // Delete associated image
        if ($galleryItem->image) {
            Storage::disk('public')->delete($galleryItem->image);
        }
    }
}