@extends('layouts.app')


@section('content')
    @include('admin._nav')
    <table class="table table-striped">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Roles</th>
            <th colspan="2">Actions</th>
        </thead>
        <tbody>
            <a href="{{route('users.create')}}" class="btn btn-primary my-2">Create User</a>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><a href="{{route('users.edit', $user)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    @if ($user->email_verified_at)
                    <td>Active</td>
                    @else
                    <td>Not active</td>
                    @endif
                    <td>
                        @foreach($user->roles as $role)
                            {{$role->title.' '}}
                        @endforeach
                    </td>
                    <td>

                        <form action="{{route('users.destroy', $user)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-link">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection