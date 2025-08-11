<?php

namespace App\Http\Controllers\admin\aktivitas;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    public function index()
    {
        $news = News::with('category')->latest()->get();
        return view('admin.aktivitas.news.index', compact('news'));
    }

    public function create()
    {
        $categories = NewsCategory::all();
        return view('admin.aktivitas.news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required|url',
            'date' => 'required|date',
            'category_id' => 'required|exists:news_categories,id',
            'is_main' => 'required|boolean',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('news', 'public');
            $validated['photo'] = $photoPath;
        }

        News::create($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit(News $news)
    {
        $categories = NewsCategory::all();
        return view('admin.aktivitas.news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required|url',
            'date' => 'required|date',
            'category_id' => 'required|exists:news_categories,id',
            'is_main' => 'required|boolean',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($news->photo && Storage::disk('public')->exists($news->photo)) {
                Storage::disk('public')->delete($news->photo);
            }
            
            $photoPath = $request->file('photo')->store('news', 'public');
            $validated['photo'] = $photoPath;
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy(News $news)
    {
        if ($news->photo && Storage::disk('public')->exists($news->photo)) {
            Storage::disk('public')->delete($news->photo);
        }
        
        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil dihapus');
    }
}
