<?php

namespace App\Http\Controllers\CommunityService;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommunityService;
class CommunityServiceController extends Controller
{
    public function index()
    {
        $community_services = CommunityService::select("id", "title", "description")
            ->latest()->paginate(8);

        return view('public.activity.community-service.index', [
            "community_services" => $community_services,
        ]);
    }

    public function show($id)
    {
        $community_service = CommunityService::findOrFail($id);

        return view('public.activity.community-service.show', [
            "community_service" => $community_service,
        ]);
    }
}
