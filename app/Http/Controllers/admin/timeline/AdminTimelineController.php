<?php

namespace App\Http\Controllers\admin\timeline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class AdminTimelineController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();
        
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }
        
        $events = $query->latest()->get();
        return view('admin.timeline.index', compact('events'));
    }

    public function create()
    {
        return view('admin.timeline.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'category' => 'required|in:lkm,external',
        ]);

        try {
            Event::create([
                'name' => $request->name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'category' => $request->category,
            ]);

            return redirect()->route('admin.timeline.index')
                ->with('success', 'Event berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menambahkan event: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit(Event $timeline)
    {
        return view('admin.timeline.edit', compact('timeline'));
    }

    public function update(Request $request, Event $timeline)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'category' => 'required|in:lkm,external',
        ]);

        try {
            $timeline->update([
                'name' => $request->name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'category' => $request->category,
            ]);

            return redirect()->route('admin.timeline.index')
                ->with('success', 'Event berhasil diperbarui');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memperbarui event: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy(Event $timeline)
    {
        try {
            $timeline->delete();

            return redirect()->route('admin.timeline.index')
                ->with('success', 'Event berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menghapus event: ' . $e->getMessage());
        }
    }
}
