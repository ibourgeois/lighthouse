@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <h4 class="pull-left">Edit {{ $project->name }}</h4>
        </div>

        <div class="panel-body">
            <form class="form-horizontal col-md-6 col-md-offset-3" method="POST" action="{{ route('projects.update', $project) }}">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Project Name</label>

                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $project->name }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="col-md-4 control-label">Project Description</label>

                    <div class="col-md-8">
                        <textarea id="description" class="form-control" name="description">{{ $project->description }}</textarea>
                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <div class="pull-right">
                            <a href="{{ route('projects.show', $project) }}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
