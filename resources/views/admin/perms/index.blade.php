@extends('layouts.app')


@section('content')
<form action="{{route('permissions.store')}}" method="POST">
    @csrf
        <table class="table table-striped">
            <th>Permissions</th>
            @if($roles)
                @foreach ($roles as $role)
                    <th>{{$role->title}}</th>
                @endforeach
            @endif
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{$permission->title}}</td>
                        @foreach ($roles as $role)
                            <td>
                                @if($role->hasPermission($permission->alias))
                                <input type="checkbox" name="{{$role->id}}[]" value="{{$permission->id}}" checked>
                                @else
                                <input type="checkbox" name="{{$role->id}}[]" value="{{$permission->id}}">
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    <button type="submit" class='btn btn-primary my-1'>Save</button>
    </form>
@endsection