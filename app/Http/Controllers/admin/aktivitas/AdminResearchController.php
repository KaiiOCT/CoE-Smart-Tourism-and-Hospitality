<?php

namespace App\Http\Controllers\admin\aktivitas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminResearchController extends Controller
{
    public function index()
    {
        return view('admin.aktivitas.research.index');
    }
}
