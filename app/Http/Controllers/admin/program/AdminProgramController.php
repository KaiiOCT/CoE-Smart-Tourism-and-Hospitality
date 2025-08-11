<?php

namespace App\Http\Controllers\admin\program;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProgramController extends Controller
{
    public function index()
    {
        return view('admin.program.index');
    }
}
