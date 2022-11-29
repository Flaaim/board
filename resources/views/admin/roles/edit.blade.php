@extends('layouts.app')


@section('content')
<form action="{{route('roles.update', $role)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{$role->title}}">
    </div>
    <div class="form-group">
        <label for="alias">Alias</label>
        <input type="text" name="alias" class="form-control" value="{{$role->alias}}">
    </div>
    <button class="btn btn-primary my-1" type="submit">Update</button>

</form>



@endsection