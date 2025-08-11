<?php

namespace App\Http\Controllers\admin\aktivitas;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::latest()->get();
        return view('admin.aktivitas.business.training.index', compact('trainings'));
    }

    public function create()
    {
        return view('admin.aktivitas.business.training.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $path = $photo->store('trainings/photos', 'public');
            $validated['photo'] = $path;
        }

        Training::create($validated);

        return redirect()->route('admin.training.index')
            ->with('success', 'Pelatihan berhasil ditambahkan.');
    }

    public function edit(Training $training)
    {
        return view('admin.aktivitas.business.training.edit', compact('training'));
    }

    public function update(Request $request, Training $training)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($training->photo && Storage::disk('public')->exists($training->photo)) {
                Storage::disk('public')->delete($training->photo);
            }

            $photo = $request->file('photo');
            $path = $photo->store('trainings/photos', 'public');
            $validated['photo'] = $path;
        }

        $training->update($validated);

        return redirect()->route('admin.training.index')
            ->with('success', 'Pelatihan berhasil diperbarui.');
    }

    public function destroy(Training $training)
    {
        if ($training->photo && Storage::disk('public')->exists($training->photo)) {
            Storage::disk('public')->delete($training->photo);
        }

        $training->delete();

        return redirect()->route('admin.training.index')
            ->with('success', 'Pelatihan berhasil dihapus.');
    }
}
