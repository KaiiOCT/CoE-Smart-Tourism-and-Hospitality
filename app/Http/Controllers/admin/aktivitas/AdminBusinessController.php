<?php

namespace App\Http\Controllers\admin\aktivitas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;class AdminBusinessController extends Controller
{
    public function index()
    {
        return view('admin.aktivitas.business.index');
    }
}
