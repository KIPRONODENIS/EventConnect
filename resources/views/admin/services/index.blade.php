@extends('layouts.admin')

@section('content')

<div class="card  w-3/4 mx-auto mt-4">
  <div class="card-header">
<h1 class="text-teal-600 botder-b border-gray-200">Modify SERVICE</h1>
  </div>
  <div class="card-body">
<form action="{{route('admin.service.update',$service->id)}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="row">
<div class="col">
  <label class="text-gray-600">Title</label>
<input type="text" name="title" class="form-control" placeholder="" value="{{$service->title}}">
</div>

<div class="col">
  <label class="text-gray-600">Select Category</label>
<select name="service_category_id" class="form-control" selected="{{$service->service_category_id}}">
  @foreach($categories as $category)
<option value="{{$category->id}}" {{$service->service_category_id==$category->id ?"selected":''}}>{{$category->name}}</option>

  @endforeach
</select>
</div>
</div>
<div class="form-group">
  <label class="text-gray-600">Select Image</label>
<input type="file" name="image"  class="form-control">
</div>
<div class="row">
<div class="col">
  <label class="text-gray-600"> Town</label>
<input type="text" name="town"  class="form-control" value="{{$service->town}}">
</div>

<div class="col">
  <label class="text-gray-600"> Price</label>
<input type="text" name="price"  class="form-control" value="{{$service->price}}">
</div>
</div>

<div class="form-group">
  <label class="text-gray-600">Description</label>
<textarea name="description" class="form-control" >
{{$service->description}}
</textarea>
</div>

<div class="form-group">
<button class="btn btn-success" type="submit">Submit</button>
</div>
</form>
  </div>

 </div>
@endsection
