<?php

namespace App\Http\Controllers\admin\aktivitas;

use App\Http\Controllers\Controller;
use App\Models\Innovation;
use App\Models\Photo;
use App\Models\MitraLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AdminInnovationController extends Controller
{
    public function index()
    {
        $innovations = Innovation::with(['photos', 'mitra_logos'])->latest()->get();
        return view('admin.aktivitas.innovation.index', compact('innovations'));
    }

    public function create()
    {
        return view('admin.aktivitas.innovation.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'jobs' => 'required|string',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'mitra_logos.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            DB::beginTransaction();

            $innovation = Innovation::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'category' => $validated['category'],
                'client' => $validated['client'],
                'jobs' => $validated['jobs']
            ]);

            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $path = $photo->store('innovations/photos', 'public');
                    Photo::create([
                        'innovation_id' => $innovation->id,
                        'photo' => $path
                    ]);
                }
            }

            if ($request->hasFile('mitra_logos')) {
                foreach ($request->file('mitra_logos') as $logo) {
                    $path = $logo->store('innovations/logos', 'public');
                    MitraLogo::create([
                        'innovation_id' => $innovation->id,
                        'logo' => $path
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('admin.innovation.index')
                ->with('success', 'Inovasi berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function edit(Innovation $innovation)
    {
        $innovation->load(['photos', 'mitra_logos']);
        return view('admin.aktivitas.innovation.edit', compact('innovation'));
    }

    public function update(Request $request, Innovation $innovation)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'jobs' => 'required|string',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'mitra_logos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            DB::beginTransaction();

            $innovation->update([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'category' => $validated['category'],
                'client' => $validated['client'],
                'jobs' => $validated['jobs']
            ]);

            if ($request->hasFile('photos')) {
                // Delete old photos
                foreach ($innovation->photos as $photo) {
                    if (Storage::disk('public')->exists($photo->photo)) {
                        Storage::disk('public')->delete($photo->photo);
                    }
                    $photo->delete();
                }

                // Add new photos
                foreach ($request->file('photos') as $photo) {
                    $path = $photo->store('innovations/photos', 'public');
                    Photo::create([
                        'innovation_id' => $innovation->id,
                        'photo' => $path
                    ]);
                }
            }

            if ($request->hasFile('mitra_logos')) {
                // Delete old logos
                foreach ($innovation->mitra_logos as $logo) {
                    if (Storage::disk('public')->exists($logo->logo)) {
                        Storage::disk('public')->delete($logo->logo);
                    }
                    $logo->delete();
                }

                // Add new logos
                foreach ($request->file('mitra_logos') as $logo) {
                    $path = $logo->store('innovations/logos', 'public');
                    MitraLogo::create([
                        'innovation_id' => $innovation->id,
                        'logo' => $path
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('admin.innovation.index')
                ->with('success', 'Inovasi berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function destroy(Innovation $innovation)
    {
        try {
            DB::beginTransaction();

            // Delete photos
            foreach ($innovation->photos as $photo) {
                if (Storage::disk('public')->exists($photo->photo)) {
                    Storage::disk('public')->delete($photo->photo);
                }
                $photo->delete();
            }

            // Delete logos
            foreach ($innovation->mitra_logos as $logo) {
                if (Storage::disk('public')->exists($logo->logo)) {
                    Storage::disk('public')->delete($logo->logo);
                }
                $logo->delete();
            }

            $innovation->delete();

            DB::commit();

            return redirect()->route('admin.innovation.index')
                ->with('success', 'Inovasi berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
