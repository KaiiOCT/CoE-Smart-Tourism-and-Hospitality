<?php

namespace App\Http\Controllers\admin\aktivitas;

use App\Http\Controllers\Controller;
use App\Models\CommunityService;
use App\Models\Photo;
use App\Models\MitraLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminServiceController extends Controller
{
    public function index()
    {
        $community_services = CommunityService::with(['photos', 'mitra_logos'])->latest()->get();
        return view('admin.aktivitas.comunity-service.service.index', compact('community_services'));
    }

    public function create()
    {
        return view('admin.aktivitas.comunity-service.service.create');
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

            $communityService = CommunityService::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'category' => $validated['category'],
                'client' => $validated['client'],
                'jobs' => $validated['jobs'],
            ]);

            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $path = $photo->store('community-services/photos', 'public');
                    Photo::create([
                        'photo' => $path,
                        'community_service_id' => $communityService->id
                    ]);
                }
            }

            if ($request->hasFile('mitra_logos')) {
                foreach ($request->file('mitra_logos') as $logo) {
                    $path = $logo->store('community-services/logos', 'public');
                    MitraLogo::create([
                        'logo' => $path,
                        'community_service_id' => $communityService->id
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admin.service.index')
                ->with('success', 'Pengabdian Masyarakat berhasil ditambahkan.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function edit(CommunityService $service)
    {
        $service->load(['photos', 'mitra_logos']);
        return view('admin.aktivitas.comunity-service.service.edit', compact('service'));
    }

    public function update(Request $request, CommunityService $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'jobs' => 'required|string',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'mitra_logos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deleted_photos' => 'nullable|string',
            'deleted_logos' => 'nullable|string'
        ]);

        try {
            DB::beginTransaction();

            $service->update([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'category' => $validated['category'],
                'client' => $validated['client'],
                'jobs' => $validated['jobs'],
            ]);

            // Handle deleted photos
            if ($request->has('deleted_photos')) {
                $deletedPhotoIds = explode(',', $request->deleted_photos);
                $photosToDelete = Photo::whereIn('id', $deletedPhotoIds)
                    ->where('community_service_id', $service->id)
                    ->get();

                foreach ($photosToDelete as $photo) {
                    Storage::disk('public')->delete($photo->photo);
                    $photo->delete();
                }
            }

            // Handle deleted logos
            if ($request->has('deleted_logos')) {
                $deletedLogoIds = explode(',', $request->deleted_logos);
                $logosToDelete = MitraLogo::whereIn('id', $deletedLogoIds)
                    ->where('community_service_id', $service->id)
                    ->get();

                foreach ($logosToDelete as $logo) {
                    Storage::disk('public')->delete($logo->logo);
                    $logo->delete();
                }
            }

            // Handle new photos
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $path = $photo->store('community-services/photos', 'public');
                    Photo::create([
                        'photo' => $path,
                        'community_service_id' => $service->id
                    ]);
                }
            }

            // Handle new logos
            if ($request->hasFile('mitra_logos')) {
                foreach ($request->file('mitra_logos') as $logo) {
                    $path = $logo->store('community-services/logos', 'public');
                    MitraLogo::create([
                        'logo' => $path,
                        'community_service_id' => $service->id
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admin.service.index')
                ->with('success', 'Pengabdian Masyarakat berhasil diperbarui.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function destroy(CommunityService $service)
    {
        try {
            DB::beginTransaction();

            // Delete photos
            foreach ($service->photos as $photo) {
                Storage::disk('public')->delete($photo->photo);
                $photo->delete();
            }

            // Delete logos
            foreach ($service->mitra_logos as $logo) {
                Storage::disk('public')->delete($logo->logo);
                $logo->delete();
            }

            $service->delete();

            DB::commit();
            return redirect()->route('admin.service.index')
                ->with('success', 'Pengabdian Masyarakat berhasil dihapus.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
