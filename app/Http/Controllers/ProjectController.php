<?php

namespace Lighthouse\Http\Controllers;

use Illuminate\Http\Request;
use Lighthouse\Http\Requests\ProjectRequest;
use Lighthouse\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->route()->getName() === 'admin.projects.index') {
            $projects = Project::paginate(10);

            return view('admin.projects.index')->with(compact('projects'));
        } else {
            $projects = $request->user()->ownedProjects()->orderBy('updated_at', 'desc')->paginate(10);

            return view('projects.index')->with(compact('projects'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->route()->getName() === 'admin.projects.create') {
            return view('admin.projects.create');
        } else {
            return view('projects.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        if ($request->route()->getName() === 'admin.projects.create') {
        } else {
            $project = Project::create([
                'name'          => $request->name,
                'slug'          => str_slug($request->name),
                'description'   => $request->description,
                'owner_id'      => $request->user()->id,
            ]);

            return redirect('/projects');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \Lighthouse\Project $project
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Project $project)
    {
        if ($request->route()->getName() === 'admin.projects.show') {
            return view('admin.projects.show');
        } else {
            return view('projects.show')->with(compact('project'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Lighthouse\Project $project
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Project $project)
    {
        if ($request->route()->getName() === 'admin.projects.edit') {
            return view('admin.projects.edit');
        } else {
            return view('projects.edit')->with(compact('project'));
        }
    }

    /*
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Lighthouse\Project      $project
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $project->name = $request->name;
        $project->description = $request->description;
        $project->save();

        return redirect(route('projects.show', $project))->with('success', 'Project updated successfully!');
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param \Lighthouse\Project $project
     *
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Project $project)
    // {
    //     //
    // }
}
