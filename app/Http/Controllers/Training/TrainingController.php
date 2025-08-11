<?php

namespace App\Http\Controllers\Training;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training;

class TrainingController extends Controller
{
    public function index(Request $request)
    {
        $trainings = Training::select("id", "title", "description", "date", "location", "type", "link", "photo")
            ->latest()
            ->paginate(8)
            ->withQueryString();

        return view('public.activity.business.training.index', [
            "trainings" => $trainings,
            "data" => $trainings
        ]);
    }

}