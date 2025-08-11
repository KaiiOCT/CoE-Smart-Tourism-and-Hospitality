<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $shops = Shop::select("id", "title", "description", "instagram", "whatsapp")
            ->with([
                'photos' => fn($query) => $query->select('id', "photo", "shop_id")
            ])
            ->latest()
            ->paginate(8)
            ->withQueryString();

        return view('public.activity.business.shop.index', [
            "shops" => $shops,
            "data" => $shops
        ]);
    }
}
