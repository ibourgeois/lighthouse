<?php

namespace Lighthouse\Http\Controllers;

use Illuminate\Http\Request;
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
            return view('projects.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \Lighthouse\Project $project
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
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
            return view('projects.edit');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Lighthouse\Project      $project
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Lighthouse\Project $project
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
