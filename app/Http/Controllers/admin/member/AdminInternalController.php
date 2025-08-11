<?php

namespace App\Http\Controllers\admin\member;

use App\Http\Controllers\Controller;
use App\Models\InternalMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminInternalController extends Controller
{
    public function index(Request $request)
    {
        $query = InternalMember::query();
        
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('position', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }
        
        $members = $query->latest()->get();
        return view('admin.member.internal.index', compact('members'));
    }

    public function create()
    {
        return view('admin.member.internal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'is_leader' => 'required|boolean',
            'study_program' => 'required|string|max:255',
            'education' => 'required|string|max:255',
            'research_field' => 'required|string|max:255',
            'email' => 'required|email|unique:internal_members,email',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            $data = $request->except('profile_picture');
            
            if ($request->hasFile('profile_picture')) {
                $file = $request->file('profile_picture');
                $filename = time() . '_' . $file->getClientOriginalName();
                
                // Ensure the directory exists
                $path = Storage::disk('public')->putFileAs('members', $file, $filename);
                
                if (!$path) {
                    return back()->with('error', 'Gagal menyimpan gambar. Silakan coba lagi.')
                        ->withInput();
                }
                
                $data['profile_picture'] = $filename;
            }

            InternalMember::create($data);

            return redirect()->route('admin.internal-member.index')
                ->with('success', 'Anggota berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menambahkan anggota: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit(InternalMember $member)
    {
        return view('admin.member.internal.edit', compact('member'));
    }

    public function update(Request $request, InternalMember $member)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'is_leader' => 'required|boolean',
            'study_program' => 'required|string|max:255',
            'education' => 'required|string|max:255',
            'research_field' => 'required|string|max:255',
            'email' => 'required|email|unique:internal_members,email,' . $member->id,
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            $data = $request->except('profile_picture');

            if ($request->hasFile('profile_picture')) {
                // Delete old image if exists
                if ($member->getRawOriginal('profile_picture')) {
                    Storage::disk('public')->delete('members/' . $member->getRawOriginal('profile_picture'));
                }

                // Store new image
                $file = $request->file('profile_picture');
                $filename = time() . '_' . $file->getClientOriginalName();
                
                // Ensure the directory exists
                $path = Storage::disk('public')->putFileAs('members', $file, $filename);
                
                if (!$path) {
                    return back()->with('error', 'Gagal menyimpan gambar. Silakan coba lagi.')
                        ->withInput();
                }
                
                $data['profile_picture'] = $filename;
            }

            $member->update($data);

            return redirect()->route('admin.internal-member.index')
                ->with('success', 'Anggota berhasil diperbarui');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memperbarui anggota: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy(InternalMember $member)
    {
        try {
            if ($member->getRawOriginal('profile_picture')) {
                Storage::disk('public')->delete('members/' . $member->getRawOriginal('profile_picture'));
            }
            
            $member->delete();

            return redirect()->route('admin.internal-member.index')
                ->with('success', 'Anggota berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menghapus anggota: ' . $e->getMessage());
        }
    }
}
