<?php

namespace App\Http\Controllers\admin\program;

use App\Http\Controllers\Controller;
use App\Models\Intern;
use App\Models\InternMajor;
use App\Models\InternProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminInterController extends Controller
{
    public function index(Request $request)
    {
        $query = Intern::query();
        
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        
        $interns = $query->latest()->get();
        return view('admin.program.inter.index', compact('interns'));
    }

    public function create()
    {
        return view('admin.program.inter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'majors' => 'nullable|array',
            'majors.*' => 'nullable|string|max:255',
            'projects' => 'nullable|array',
            'projects.*' => 'nullable|string|max:255',
        ]);

        try {
            // Handle photo upload
            $photoPath = null;
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('interns', 'public');
            }

            // Create new intern
            $intern = Intern::create([
                'name' => $request->name,
                'description' => $request->description,
                'photo' => $photoPath,
            ]);

            // Create majors
            if ($request->has('majors')) {
                foreach ($request->majors as $majorName) {
                    if (!empty($majorName)) {
                        InternMajor::create([
                            'intern_id' => $intern->id,
                            'name' => $majorName,
                        ]);
                    }
                }
            }

            // Create projects
            if ($request->has('projects')) {
                foreach ($request->projects as $projectName) {
                    if (!empty($projectName)) {
                        InternProject::create([
                            'intern_id' => $intern->id,
                            'name' => $projectName,
                        ]);
                    }
                }
            }

            return redirect()->route('admin.intern.index')->with('success', 'Program MBKM dan Magang berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menambahkan program: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(Intern $intern)
    {
        return view('admin.program.inter.edit', compact('intern'));
    }

    public function update(Request $request, Intern $intern)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'majors' => 'nullable|array',
            'majors.*' => 'nullable|string|max:255',
            'projects' => 'nullable|array',
            'projects.*' => 'nullable|string|max:255',
        ]);

        try {
            // Handle photo upload
            if ($request->hasFile('photo')) {
                // Delete old photo if exists
                if ($intern->photo && Storage::disk('public')->exists($intern->photo)) {
                    Storage::disk('public')->delete($intern->photo);
                }
                
                $photoPath = $request->file('photo')->store('interns', 'public');
                $intern->photo = $photoPath;
            }

            // Update intern
            $intern->name = $request->name;
            $intern->description = $request->description;
            $intern->save();

            // Delete old majors and create new ones
            $intern->majors()->delete();
            if ($request->has('majors')) {
                foreach ($request->majors as $majorName) {
                    if (!empty($majorName)) {
                        InternMajor::create([
                            'intern_id' => $intern->id,
                            'name' => $majorName,
                        ]);
                    }
                }
            }

            // Delete old projects and create new ones
            $intern->projects()->delete();
            if ($request->has('projects')) {
                foreach ($request->projects as $projectName) {
                    if (!empty($projectName)) {
                        InternProject::create([
                            'intern_id' => $intern->id,
                            'name' => $projectName,
                        ]);
                    }
                }
            }

            return redirect()->route('admin.intern.index')->with('success', 'Program MBKM dan Magang berhasil diperbarui');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memperbarui program: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(Intern $intern)
    {
        try {
            // Delete photo if exists
            if ($intern->photo && Storage::disk('public')->exists($intern->photo)) {
                Storage::disk('public')->delete($intern->photo);
            }

            // Delete related majors and projects
            $intern->majors()->delete();
            $intern->projects()->delete();
            
            // Delete intern
            $intern->delete();

            return redirect()->route('admin.intern.index')->with('success', 'Program MBKM dan Magang berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menghapus program: ' . $e->getMessage());
        }
    }
}
