<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\Type;
use App\Http\Requests\StoreprojectRequest;
use App\Http\Requests\UpdateprojectRequest;
use Illuminate\Support\Facades\Storage;

use function PHPSTORM_META\type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view("admin.projects.create", compact("types"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreprojectRequest $request)
    {
        // dd($request);
        $request->validated();
        $newProject = new Project();

        if ($request->hasFile('cover_image')) {

            $path = Storage::disk('public')->put('post_images', $request->cover_image);
            $newProject->cover_image = $path;
            
        }

        // if ($request->hasFile("'thumb")) {

        //     $path = Storage::disk("public")->put("post_images", $request->thumb);
        //     $newProject->thumb = $path;
        // }


        $newProject->fill($request->all());
        $newProject->save();
        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(project $project)
    {
        return view("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(project $project)
    {
        $types = Type::all();
        return view('admin.projects.edit', compact('project','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreprojectRequest $request, project $project)
    {
        // dd($request);
        $request->validated();

        if ($request->hasFile('cover_images')) {

            $path = Storage::disk('public')->put('post_images', $request->cover_images);
            $project->cover_images = $path;
        }

        $project->fill($request->all());
        $project->save();

        return redirect()->route("admin.projects.show", $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(project $project)
    {
        $project->delete();
        return redirect()->route("admin.projects.index");
    }
}
