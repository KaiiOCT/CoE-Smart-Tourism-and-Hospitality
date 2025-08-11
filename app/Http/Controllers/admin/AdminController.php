<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.project.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'yt_link' => 'required|url'
        ]);

        Project::create($validated);

        return redirect()->route('admin.index')->with('success', 'Project berhasil ditambahkan');
    }

    public function edit(Project $project)
    {
        return view('admin.project.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'yt_link' => 'required|url'
        ]);

        $project->update($validated);

        return redirect()->route('admin.index')->with('success', 'Project berhasil diperbarui');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.index')->with('success', 'Project berhasil dihapus');
    }
}
