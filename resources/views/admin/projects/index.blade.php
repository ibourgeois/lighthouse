@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h4 class="pull-left">Projects</h4>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-default pull-right">New Project</a>
    </div>

    <table class="table table-hover">
        <thead>
            <th>Name</th>
            <th>Owner</th>
            <th></th>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr>
                    <td class="middle">{{ $project->name }}</td>
                    <td class="middle">{{ Lighthouse\User::find($project->owner_id)->name }}</td>
                    <td class="middle shrink">
                        <a href="{{ route('projects.show', $project) }}" class="btn btn-default">View</a>
                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-default">Edit</a>
                        <a href="{{ route('projects.destroy', $project) }}" class="btn btn-default">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<center>
    {{ $projects->links() }}
</center>
@endsection
