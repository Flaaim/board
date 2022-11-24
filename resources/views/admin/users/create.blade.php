@extends('layouts.app')

@section('content')
    <div class="form-group">
        <form action="{{route('users.store')}}" method="POST">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="" class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary mt-2">Create</button>
        </form>
    </div>
@endsection