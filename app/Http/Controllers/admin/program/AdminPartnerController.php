<?php

namespace App\Http\Controllers\admin\program;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPartnerController extends Controller
{
    public function index(Request $request)
    {
        $query = Partner::query();
        
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('program', 'like', "%{$search}%");
            });
        }
        
        $partners = $query->latest()->get();
        return view('admin.program.partner.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.program.partner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'names' => 'required|array',
            'names.*' => 'required|string|max:255',
            'programs' => 'required|array',
            'programs.*' => 'required|string|max:255',
            'photos' => 'required|array',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        try {
            // Create partners from the form data
            for ($i = 0; $i < count($request->names); $i++) {
                if (!empty($request->names[$i]) && !empty($request->programs[$i]) && $request->hasFile("photos.{$i}")) {
                    $photoPath = $request->file("photos.{$i}")->store('partners', 'public');
                    
                    Partner::create([
                        'name' => $request->names[$i],
                        'program' => $request->programs[$i],
                        'photo' => $photoPath,
                    ]);
                }
            }

            return redirect()->route('admin.partner.index')->with('success', 'Partner berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(Partner $partner)
    {
        return view('admin.program.partner.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'names.0' => 'required|string|max:255',
            'programs.0' => 'required|string|max:255',
            'photos.0' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        try {
            $partner->name = $request->names[0];
            $partner->program = $request->programs[0];

            if ($request->hasFile('photos.0')) {
                // Delete old photo if exists
                if ($partner->photo && Storage::disk('public')->exists($partner->photo)) {
                    Storage::disk('public')->delete($partner->photo);
                }
                
                $photoPath = $request->file('photos.0')->store('partners', 'public');
                $partner->photo = $photoPath;
            }

            $partner->save();

            return redirect()->route('admin.partner.index')->with('success', 'Partner berhasil diperbarui');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(Partner $partner)
    {
        try {
            // Delete photo if exists
            if ($partner->photo && Storage::disk('public')->exists($partner->photo)) {
                Storage::disk('public')->delete($partner->photo);
            }
            
            $partner->delete();

            return redirect()->route('admin.partner.index')->with('success', 'Partner berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
