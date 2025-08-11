<?php

namespace App\Http\Controllers\admin\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminMembercontroller extends Controller
{
    public function index()
    {
        return view('admin.member.index');
    }
}
