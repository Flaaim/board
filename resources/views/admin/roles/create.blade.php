@extends('layouts.app')


@section('content')
    <form action="{{route('roles.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{old('title')}}">
        </div>
        <div class="form-group">
            <label for="alias">Alias</label>
            <input type="text" name="alias" class="form-control" value="{{old('alias')}}">
        </div>
        <button class="btn btn-primary my-1" type="submit">Create</button>
    
    </form>
@endsection