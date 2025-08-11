<?php

namespace App\Http\Controllers\Bussines;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BussinesController extends Controller
{
    public function index()
    {
        return view('public.activity.business.index');
    }
}