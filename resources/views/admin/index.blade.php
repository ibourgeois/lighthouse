@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="center">Users</h3>
                <hr />
                <h3 class="center">{{ Lighthouse\User::count() }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="center">Projects</h3>
                <hr />
                <h3 class="center">{{ Lighthouse\Project::count() }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="center">Teams</h3>
                <hr />
                <h3 class="center">0</h3>
            </div>
        </div>
    </div>
</div>
@endsection
