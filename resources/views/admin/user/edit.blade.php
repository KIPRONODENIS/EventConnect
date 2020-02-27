@extends('layouts.admin')

@section('content')

<div class="card m-4">
<form enctype="multipart/form-data" class="w-75 mx-auto py-4" method="post" action="{{route('admin.user.update',$user->id)}}">
  @csrf
  @method('put')
<div class="form-group">
<label>Name</label>
<input type="text" name="name"  class="form-control" value="{{$user->name}}">
@error('name')
<div class="text-danger">{{$message}}</div>

@enderror
</div>

<div class="form-group">
<label>Email</label>
<input type="text" name="email" class="form-control" value="{{$user->email}}">
@error('email')
<div class="text-danger">{{$message}}</div>

@enderror
</div>

<div class="form-group">
<label>Role</label>
<select class="form-control" name="role" >
<option value="Admin">Admin</option>
<option value="Vendor" >Vendor</option>
<option value="client">client</option>
</select>
@error('role')
<div class="text-danger">{{$message}}</div>

@enderror
</div>

<div class="form-group">
<label>Image</label>
<input type="file" name="image"  class="form-control" >
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" value="save Changes">
<a href="{{route('admin.index')}}" class="my-2">Dashboard</a>
</div>
</form>
</div>

@endsection
