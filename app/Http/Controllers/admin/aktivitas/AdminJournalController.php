<?php

namespace App\Http\Controllers\admin\aktivitas;

use App\Http\Controllers\Controller;
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminJournalController extends Controller
{
    public function index()
    {
        $journals = Journal::latest()->get();
        return view('admin.aktivitas.research.journal.index', compact('journals'));
    }

    public function create()
    {
        return view('admin.aktivitas.research.journal.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'writer' => 'required|string|max:255',
            'date' => 'required|date',
            'doi_link' => 'required|url|max:255',
            'journal_link' => 'required|url|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('journals', 'public');
            $validated['photo'] = $path;
        }

        Journal::create($validated);

        return redirect()->route('admin.journal.index')
            ->with('success', 'Jurnal berhasil ditambahkan.');
    }

    public function edit(Journal $journal)
    {
        return view('admin.aktivitas.research.journal.edit', compact('journal'));
    }

    public function update(Request $request, Journal $journal)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'writer' => 'required|string|max:255',
            'date' => 'required|date',
            'doi_link' => 'required|url|max:255',
            'journal_link' => 'required|url|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($journal->photo && Storage::disk('public')->exists($journal->photo)) {
                Storage::disk('public')->delete($journal->photo);
            }
            
            $path = $request->file('photo')->store('journals', 'public');
            $validated['photo'] = $path;
        }

        $journal->update($validated);

        return redirect()->route('admin.journal.index')
            ->with('success', 'Jurnal berhasil diperbarui.');
    }

    public function destroy(Journal $journal)
    {
        if ($journal->photo && Storage::disk('public')->exists($journal->photo)) {
            Storage::disk('public')->delete($journal->photo);
        }

        $journal->delete();

        return redirect()->route('admin.journal.index')
            ->with('success', 'Jurnal berhasil dihapus.');
    }
}
