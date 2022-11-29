@extends('layouts.app')

@section('content')
    <form action="{{route('users.verify', $user)}}" method="POST">
        @csrf 
        <button class="btn btn-primary">Verify</button>
    </form>
    <div class="form-group">
        <form action="{{route('users.update', $user)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group my-2">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control">
            </div>
            <div class="form-group my-2">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="{{$user->email}}" class="form-control">    
            </div>
            <div class="form-group my-2">
                <label for="roles">List of user roles:</label>
                <select name="roles[]" class="form-control" id="roles" multiple>
                    @foreach ($roles as $role)
                        @if($user->roles->contains($role))
                            <option value="{{$role->id}}" selected>{{$role->title}}</option>
                        @else
                            <option value="{{$role->id}}">{{$role->title}}</option>
                        @endif
                    @endforeach

                   
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Edit</button>
        </form>
    </div>
@endsection