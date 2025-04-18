<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsRequest;
use App\Models\News;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Request;

class NewsController extends Controller
{
    use UploadTrait;

    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(NewsRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);

        if (request()->hasFile('image')) {
            $data['image'] = $this->uploadFile(request()->file('image'), 'news');
        }

        News::create($data);

        return redirect()->route('admin.news.index')
            ->with('success', 'News created successfully.');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(NewsRequest $request, News $news)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);

        if (request()->hasFile('image')) {
            // Delete old image if exists
            if ($news->image) {
                $this->deleteFile($news->image);
            }

            $data['image'] = $this->uploadFile(request()->file('image'), 'news');
        }

        $news->update($data);

        return redirect()->route('admin.news.index')
            ->with('success', 'News updated successfully.');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            $this->deleteFile($news->image);
        }

        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'News deleted successfully.');
    }
}