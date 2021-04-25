<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        $news=News::query()
            ->latest()
            ->paginate(5);

        return view('news.news-list',[
            'news'=>$news
        ]);
    }
    public function show(News $news)
    {
        return view('news.show', [
            'news'=>$news
        ]);
    }
    public function create()
    {
        return view('news.create');
    }

    public function store(NewsRequest $request)
    {
        $news=auth()->user()
            ->news()
            ->create($request->validatedWithImage());
        return redirect()->route('news.show', $news);
    }

    public function edit(News $news)
    {
        return view('news.create',[
            'news'=>$news
        ]);
    }

    public function update(NewsRequest $request, News $news)
    {
        $news->update($request->validatedWithImage());
        return redirect()->route('news.show', $news);
    }

    public function destroy(News $news)
    {
        $news->deleteImage();
        $news->delete();
        return redirect()->route('news.index');
    }
    function removeImage(News $news){
        $this->authorize('update', $news);

        $news->deleteImage();
        $news->update([
            'image_path'=>null
        ]);
        return back();
    }
}
