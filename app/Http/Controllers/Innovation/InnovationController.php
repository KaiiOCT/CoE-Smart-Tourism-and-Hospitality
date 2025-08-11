<?php

namespace App\Http\Controllers\Innovation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Innovation;
class InnovationController extends Controller
{
    public function index()
    {
        $innovations = Innovation::select("id", "title", "description")
            ->latest()->paginate(8);

        return view('public.activity.innovation.index', [
            "innovations" => $innovations,
        ]);
    }

    public function show($id)
    {
        $innovation = Innovation::findOrFail($id);

        return view('public.activity.innovation.show.index', [
            "innovation" => $innovation,
        ]);
    }
}
