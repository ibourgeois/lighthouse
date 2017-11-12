@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h4 class="pull-left">Users</h4>
        <a href="{{ route('admin.users.create') }}" class="btn btn-default pull-right">New User</a>
    </div>

    <table class="table table-hover">
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th></th>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="middle">{{ $user->name }}</td>
                    <td class="middle"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                    <td class="middle shrink">
                        <a href="{{ route('profile.show', $user) }}" class="btn btn-default">View</a>
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-default">Edit</a>
                        <a href="{{ route('admin.users.destroy', $user) }}" class="btn btn-default">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<center>
    {{ $users->links() }}
</center>
@endsection
