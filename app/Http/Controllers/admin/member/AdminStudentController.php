<?php

namespace App\Http\Controllers\admin\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;

class AdminStudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Member::query();
        
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('position', 'like', "%{$search}%");
            });
        }
        
        $members = $query->latest()->get();
        return view('admin.member.student.index', compact('members'));
    }

    public function create()
    {
        return view('admin.member.student.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'status' => 'required|in:inhouse,alumni',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            $data = $request->except('photo');
            
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $filename = time() . '_' . $file->getClientOriginalName();
                
                // Ensure the directory exists
                $path = Storage::disk('public')->putFileAs('members', $file, $filename);
                
                if (!$path) {
                    return back()->with('error', 'Gagal menyimpan gambar. Silakan coba lagi.')
                        ->withInput();
                }
                
                $data['photo'] = $path;
            }

            Member::create($data);

            return redirect()->route('admin.student-member.index')
                ->with('success', 'Anggota tim berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menambahkan anggota: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit(Member $member)
    {
        return view('admin.member.student.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'status' => 'required|in:inhouse,alumni',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            $data = $request->except('photo');

            if ($request->hasFile('photo')) {
                // Delete old image if exists
                if ($member->photo) {
                    Storage::disk('public')->delete($member->photo);
                }

                // Store new image
                $file = $request->file('photo');
                $filename = time() . '_' . $file->getClientOriginalName();
                
                // Store the file
                $path = Storage::disk('public')->putFileAs('members', $file, $filename);
                
                if (!$path) {
                    return back()->with('error', 'Gagal menyimpan gambar. Silakan coba lagi.')
                        ->withInput();
                }
                
                $data['photo'] = $path;
            }

            $member->update($data);

            return redirect()->route('admin.student-member.index')
                ->with('success', 'Anggota tim berhasil diperbarui');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memperbarui anggota: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy(Member $member)
    {
        try {
            if ($member->photo) {
                Storage::disk('public')->delete($member->photo);
            }
            
            $member->delete();

            return redirect()->route('admin.student-member.index')
                ->with('success', 'Anggota tim berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menghapus anggota: ' . $e->getMessage());
        }
    }
}
