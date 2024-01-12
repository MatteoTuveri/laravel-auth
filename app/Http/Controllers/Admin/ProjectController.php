<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $slug = Str::slug($data['title'],'-');
        $userId = auth()->id(); // or Auth::id();
        $data['slug'] = $slug;
        $data['user_id'] = $userId;
        $project = Project::create($data);
        return redirect()->route('admin.posts.show', $project->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $slug = Str::slug($data['title'],'-');
        $data['user_id'] = $project->user_id;
        $data['slug'] = $slug;
        $project->update($data);
        return redirect()->route('admin.posts.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('admin.posts.index')->with('msg',"$project->title è stato eliminato");
    }
}
