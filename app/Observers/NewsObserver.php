<?php

namespace App\Observers;

use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsObserver
{
    public function creating(News $news)
    {
        // Generate slug if not provided
        if (empty($news->slug)) {
            $news->slug = Str::slug($news->title);
        }
    }

    public function updating(News $news)
    {
        // Update slug if title has changed
        if ($news->isDirty('title')) {
            $news->slug = Str::slug($news->title);
        }
    }

    public function deleted(News $news)
    {
        // Delete associated image
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
    }
}