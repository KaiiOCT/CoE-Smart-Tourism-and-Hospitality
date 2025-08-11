<?php

namespace App\Http\Controllers\Research;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    public function index()
    {
        return view('public.activity.research.index');
    }
}