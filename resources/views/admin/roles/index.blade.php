@extends('layouts.app')


@section('content')
    @include('admin._nav')
        <table class="table table-striped">
            <th>ID</th>
            <th>Title</th>
            <th>Alias</th>
            <th>Action</th>
            <tbody>
                <a href="{{route('roles.create')}}" class="btn btn-primary my-1">Create</a>
                @if(count($roles) > 0)
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td><a href="{{route('roles.edit', $role)}}">{{$role->title}}</a></td>
                            <td>{{$role->alias}}</td>
                            <td>
                                <form action="{{route('roles.destroy', $role)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

@endsection