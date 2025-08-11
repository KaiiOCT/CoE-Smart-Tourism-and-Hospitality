<?php

namespace App\Http\Controllers\Journal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Journal;

class JournalController extends Controller
{
    public function index(Request $request)
    {
        $journals = Journal::orderBy('date', 'desc')
            ->paginate(10)
            ->withQueryString(); // Penting untuk mempertahankan query parameter

        return view('public.activity.research.journal.index', [
            'journals' => $journals,
            'data' => $journals
        ]);
    }
}
