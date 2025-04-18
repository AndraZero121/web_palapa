<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use App\Models\GalleryItem;
use App\Traits\UploadTrait;

class GalleryController extends Controller
{
    use UploadTrait;

    public function index()
    {
        $galleryItems = GalleryItem::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.gallery.index', compact('galleryItems'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(GalleryRequest $request)
    {
        $data = $request->validated();

        if (request()->hasFile('image')) {
            $data['image'] = $this->uploadFile(request()->file('image'), 'gallery');
        }

        GalleryItem::create($data);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery item created successfully.');
    }

    public function edit(GalleryItem $galleryItem)
    {
        return view('admin.gallery.edit', compact('galleryItem'));
    }

    public function update(GalleryRequest $request, GalleryItem $galleryItem)
    {
        $data = $request->validated();

        if (request()->hasFile('image')) {
            // Delete old image if exists
            if ($galleryItem->image) {
                $this->deleteFile($galleryItem->image);
            }

            $data['image'] = $this->uploadFile(request()->file('image'), 'gallery');
        }

        $galleryItem->update($data);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery item updated successfully.');
    }

    public function destroy(GalleryItem $galleryItem)
    {
        if ($galleryItem->image) {
            $this->deleteFile($galleryItem->image);
        }

        $galleryItem->delete();

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery item deleted successfully.');
    }
}