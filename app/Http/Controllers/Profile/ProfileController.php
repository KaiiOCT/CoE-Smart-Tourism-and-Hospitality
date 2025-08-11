<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InternalMember;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $memberId = $request->query('memberId');
        $page = $request->query('page', 1);

        $members = InternalMember::query()
            ->when($memberId, function ($query) use ($memberId) {
                return $query->orderByRaw("id = ? DESC", [$memberId]);
            })
            ->latest()
            ->paginate(8, ['*'], 'page', $page);

        return view('public.about-us.profile.index', [
            "members" => $members,
            "memberId" => $memberId,
        ]);
    }
}
