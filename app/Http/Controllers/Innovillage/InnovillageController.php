<?php

namespace App\Http\Controllers\Innovillage;

use App\Http\Controllers\Controller;
use App\Models\Innovillage;
use Illuminate\Http\Request;

class InnovillageController extends Controller
{
    public function index()
    {
        $innovillages = Innovillage::with('photos')
            ->orderBy('created_at', 'desc')
            ->paginate(8);
        return view('public.activity.research.innovillage.index', compact('innovillages'));
    }

    public function show(Innovillage $innovillage)
    {
        $innovillage->load('photos');
        return view('public.activity.research.innovillage.show', compact('innovillage'));
    }
} 
