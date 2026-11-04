<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $category_id = $request->query('category_id');
        $categories = NewsCategory::all();

        // Ambil berita utama (is_main = 1)
        $mainNewses = News::where('is_main', 1)->latest()->get();

        // Ambil daftar berita dengan filter kategori jika ada
        $query = News::with('category')->latest();
        if ($category_id) {
            $query->where('category_id', $category_id);
        }
        $newses = $query->paginate(10);

        // Menuju resources/views/public/activity/news/index.blade.php
        return view('public.activity.news.index', compact('mainNewses', 'newses', 'categories', 'category_id'));
    }

    /**
     * Halaman Detail STH News (Berita Internal)
     */
    public function show(News $news)
    {
        // Ambil 3 berita terbaru lainnya sebagai rekomendasi di bagian bawah
        $recentNewses = News::where('id', '!=', $news->id)
            ->latest()
            ->take(3)
            ->get();

        // Menuju resources/views/public/sthnews/show.blade.php
        return view('public.sthnews.show', compact('news', 'recentNewses'));
    }
}