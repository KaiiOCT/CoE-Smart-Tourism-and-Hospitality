<?php

namespace App\Http\Controllers\admin\aktivitas;

use App\Http\Controllers\Controller;
use App\Models\Innovillage;
use App\Models\Photo;
use App\Models\InnovillageTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminInnovilageController extends Controller
{
    public function index()
    {
        $innovillages = Innovillage::with(['photos', 'teams'])->latest()->get();
        return view('admin.aktivitas.research.innovilage.index', compact('innovillages'));
    }

    public function create()
    {
        return view('admin.aktivitas.research.innovilage.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'year' => 'required|integer|min:2000|max:2100',
            'team_photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'team_names.*' => 'required_with:team_photos.*|string|max:255',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            DB::beginTransaction();

            $innovillage = Innovillage::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'year' => $validated['year'],
            ]);

            // Handle team photos and names
            if ($request->hasFile('team_photos')) {
                foreach ($request->file('team_photos') as $index => $photo) {
                    if ($photo && isset($request->team_names[$index])) {
                        $path = $photo->store('innovillages/teams', 'public');
                        InnovillageTeam::create([
                            'name' => $request->team_names[$index],
                            'photo' => $path,
                            'innovillage_id' => $innovillage->id
                        ]);
                    }
                }
            }

            // Handle documentation photos
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $path = $photo->store('innovillages/photos', 'public');
                    Photo::create([
                        'photo' => $path,
                        'innovillage_id' => $innovillage->id
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admin.innovilage.index')
                ->with('success', 'Innovillage berhasil ditambahkan.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function edit(Innovillage $innovilage)
    {
        $innovilage->load(['photos', 'teams']);
        return view('admin.aktivitas.research.innovilage.edit', compact('innovilage'));
    }

    public function update(Request $request, Innovillage $innovilage)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'year' => 'required|integer|min:2000|max:2100',
            'team_photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'team_names.*' => 'required_with:team_photos.*|string|max:255',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deleted_photos' => 'nullable|string',
            'deleted_teams' => 'nullable|string'
        ]);

        try {
            DB::beginTransaction();

            $innovilage->update([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'year' => $validated['year'],
            ]);

            // Handle deleted photos
            if ($request->has('deleted_photos')) {
                $deletedPhotoIds = explode(',', $request->deleted_photos);
                $photosToDelete = Photo::whereIn('id', $deletedPhotoIds)
                    ->where('innovillage_id', $innovilage->id)
                    ->get();

                foreach ($photosToDelete as $photo) {
                    Storage::disk('public')->delete($photo->photo);
                    $photo->delete();
                }
            }

            // Handle deleted team members
            if ($request->has('deleted_teams')) {
                $deletedTeamIds = explode(',', $request->deleted_teams);
                $teamsToDelete = InnovillageTeam::whereIn('id', $deletedTeamIds)
                    ->where('innovillage_id', $innovilage->id)
                    ->get();

                foreach ($teamsToDelete as $team) {
                    Storage::disk('public')->delete($team->photo);
                    $team->delete();
                }
            }

            // Handle new team photos and names
            if ($request->hasFile('team_photos')) {
                foreach ($request->file('team_photos') as $index => $photo) {
                    if ($photo && isset($request->team_names[$index])) {
                        $path = $photo->store('innovillages/teams', 'public');
                        InnovillageTeam::create([
                            'name' => $request->team_names[$index],
                            'photo' => $path,
                            'innovillage_id' => $innovilage->id
                        ]);
                    }
                }
            }

            // Handle new photos
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $path = $photo->store('innovillages/photos', 'public');
                    Photo::create([
                        'photo' => $path,
                        'innovillage_id' => $innovilage->id
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admin.innovilage.index')
                ->with('success', 'Innovillage berhasil diperbarui.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function destroy(Innovillage $innovilage)
    {
        try {
            DB::beginTransaction();

            // Delete photos
            foreach ($innovilage->photos as $photo) {
                Storage::disk('public')->delete($photo->photo);
                $photo->delete();
            }

            // Delete team members
            foreach ($innovilage->teams as $team) {
                Storage::disk('public')->delete($team->photo);
                $team->delete();
            }

            $innovilage->delete();

            DB::commit();
            return redirect()->route('admin.innovilage.index')
                ->with('success', 'Innovillage berhasil dihapus.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
