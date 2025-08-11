<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\InternalMember;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public $member_options = [
        [
            "type" => "internal",
            "name" => "Anggota Internal",
        ],
        [
            "type" => "inhouse",
            "name" => "Mahasiswa Magang",
        ],
        [
            "type" => "alumni",
            "name" => "Alumni",
        ],
    ];

    public function index(Request $request)
    {
        $member_type = $request->query('type', 'internal');
        $members = $this->getMembers($member_type);

        return view('public.about-us.team.index', [
            "members" => $members,
            "member_options" => $this->member_options,
            "member_type" => $member_type
        ]);
    }

    private function getMembers($type = "internal")
    {
        if (in_array($type, ["inhouse", "alumni"])) {
            return Member::select("id", "name", "position", "photo")->where("status", $type)
                ->latest()
                ->get();
        }
        return InternalMember::select(["id", "name", "position", "profile_picture", "is_leader"])
            ->orderByDesc("is_leader")
            ->latest()
            ->get();
    }
}
