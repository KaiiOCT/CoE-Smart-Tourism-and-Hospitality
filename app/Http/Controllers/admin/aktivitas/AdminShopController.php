<?php

namespace App\Http\Controllers\admin\aktivitas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AdminShopController extends Controller
{
    public function index()
    {
        $shops = Shop::with('photos')->orderBy('created_at', 'desc')->get();
        return view('admin.aktivitas.business.shop.index', compact('shops'));
    }

    public function create()
    {
        return view('admin.aktivitas.business.shop.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'instagram' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        try {
            DB::beginTransaction();

            $shop = Shop::create([
                'title' => $request->title,
                'description' => $request->description,
                'instagram' => $request->instagram,
                'whatsapp' => $request->whatsapp,
            ]);

            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $path = $photo->store('shops/photos', 'public');
                    $shop->photos()->create([
                        'photo' => $path
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admin.shop.index')->with('success', 'Shop created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to create shop: ' . $e->getMessage());
        }
    }

    public function edit(Shop $shop)
    {
        $shop->load('photos');
        return view('admin.aktivitas.business.shop.edit', compact('shop'));
    }

    public function update(Request $request, Shop $shop)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'instagram' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        try {
            DB::beginTransaction();

            $shop->update([
                'title' => $request->title,
                'description' => $request->description,
                'instagram' => $request->instagram,
                'whatsapp' => $request->whatsapp,
            ]);

            // Handle deleted photos
            if ($request->has('deleted_photos') && !empty($request->deleted_photos)) {
                $deletedPhotoIds = explode(',', $request->deleted_photos);
                $photosToDelete = $shop->photos()->whereIn('id', $deletedPhotoIds)->get();

                foreach ($photosToDelete as $photo) {
                    Storage::disk('public')->delete($photo->photo);
                }

                $shop->photos()->whereIn('id', $deletedPhotoIds)->delete();
            }

            // Handle new photos
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $path = $photo->store('shops/photos', 'public');
                    $shop->photos()->create([
                        'photo' => $path
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admin.shop.index')->with('success', 'Shop updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to update shop: ' . $e->getMessage());
        }
    }

    public function destroy(Shop $shop)
    {
        try {
            DB::beginTransaction();

            // Delete photos from storage
            foreach ($shop->photos as $photo) {
                Storage::disk('public')->delete($photo->photo);
            }

            // Delete shop and related photos (cascade)
            $shop->delete();

            DB::commit();
            return redirect()->route('admin.shop.index')->with('success', 'Shop deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to delete shop: ' . $e->getMessage());
        }
    }
}
