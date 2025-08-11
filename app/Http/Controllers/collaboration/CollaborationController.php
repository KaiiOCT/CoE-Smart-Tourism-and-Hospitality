<?php

namespace App\Http\Controllers\collaboration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
class CollaborationController extends Controller
{
    public function index()
    {
        $partners = Partner::select("id", "name", "program", "photo")->latest()->get();
        return view('public.program.collaboration.index', [
            "partners" => $partners,
        ]);
    }
}