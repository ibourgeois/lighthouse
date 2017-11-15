@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <h4 class="pull-left">{{ $project->name }}</h4>
            <div class="pull-right">
                <a href="{{ route('projects.edit', $project) }}" class="btn btn-default">Edit</a>
                <a href="#" class="btn btn-default">Settings</a>
            </div>
        </div>

        <div class="panel-body">
            <p>{{ $project->description }}</p>
        </div>
    </div>
</div>
@endsection
