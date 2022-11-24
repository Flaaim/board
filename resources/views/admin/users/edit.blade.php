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
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="{{$user->email}}" class="form-control">
            <button type="submit" class="btn btn-primary mt-3">Edit</button>
        </form>
    </div>
@endsection