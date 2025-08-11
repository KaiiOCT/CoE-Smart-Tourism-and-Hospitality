<?php

namespace App\Http\Controllers\Intern;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Intern;
class InternController extends Controller
{
    public function index()
    {
        $interns = Intern::select("id", "name", "description", "photo")
            ->with([
                'majors' => fn($query) => $query->select("id", "name", "intern_id"),
                'projects' => fn($query) => $query->select("id", "name", "intern_id"),
            ])
            ->latest()->get();

        return view('public.program.intern.index', [
            "interns" => $interns,
        ]);
    }
}