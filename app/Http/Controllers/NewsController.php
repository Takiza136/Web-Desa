<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        // Get news with pagination (with try-catch for Vercel)
        try {
            $news = News::latest('published_at')->paginate(6);
        } catch (\Exception $e) {
            $news = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 6);
        }
        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }
}
