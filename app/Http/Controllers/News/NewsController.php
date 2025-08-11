<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsCategory;

class NewsController extends Controller
{
    public $category_id = "";
    public $page = 1;
    public $categories;
    public $queryString = [
        'page' => ['except' => 1],
    ];

    public function mount()
    {
        $this->categories = NewsCategory::select("id", "name")->get();
    }

    public function index(Request $request)
    {
        $category_id = $request->query('category_id', '');

        // Get main news for header banner
        $mainNews = News::select("id", "title", "description", "date", "category_id", "link", "photo")
            ->with([
                "category" => fn($query) => $query->select("id", "name")
            ])
            ->where("is_main", 1)
            ->latest()
            ->first();

        // Get news list with pagination and category filter
        $newses = News::select("id", "title", "description", "date", "category_id", "link", "photo")
            ->with([
                "category" => fn($query) => $query->select("id", "name"),
            ])
            ->when($category_id, function ($query) use ($category_id) {
                $query->where("category_id", $category_id);
            })
            ->orderBy("date", 'desc')
            ->paginate(8)
            ->withQueryString(); // Ini penting untuk mempertahankan parameter URL lainnya

        // Get all categories for navigation
        $categories = NewsCategory::select("id", "name")->get();

        return view('public.activity.news.index2', [
            "newses" => $newses,
            "mainNews" => $mainNews,
            "categories" => $categories,
            "category_id" => $category_id,
            "data" => $newses
        ]);
    }

    public function setPage($target = "1")
    {
        if ($target == 'prev' && $this->page != 1) {
            $this->page = $this->page - 1;
        } elseif ($target == 'next') {
            $this->page = $this->page + 1;
        } elseif (is_numeric($target)) {
            $this->page = $target;
        }
    }

    public function setCategoryId($id = "")
    {
        $this->category_id = $id;
        $this->page = 1;
    }
}
