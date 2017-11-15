@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body clearfix">
            <h4 class="pull-left">Projects</h4>
            <a href="{{ route('projects.create') }}" class="btn btn-default pull-right">New Project</a>
        </div>
    </div>

    @if($projects->count() == 0)
        <div class="panel panel-default">
            <div class="panel-body">
                <center><h4>You have no projects.</h4></center>
            </div>
        </div>
    @else
        @foreach($projects as $project)
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4><a href="{{ route('projects.show', $project->id) }}">{{ $project->name }}</a></h4>
                    <p>{{ $project->description }}</p>
                    <small>Updated {{ $project->updated_at->diffForHumans() }}</small>
                </div>
            </div>
        @endforeach

        <center>{{ $projects->links() }}</center>
    @endif
@endsection
