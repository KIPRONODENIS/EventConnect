@extends('layouts.admin')

@section('content')
<div class="w-75 mx-auto px-5">
<h1 class="text-md text-blue-400 text-center uppercase font-semibold my-3"> {{$event->title}}</h1>

<form action="{{route('admin.events.update',$event->id)}}"  method="post">
  @csrf
  @method('put')
<div class="md:flex md:items-center mb-6">
  <div class="md:w-1/3">
    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
      Event Title
    </label>
  </div>
  <div class="md:w-2/3">
    <input name="title" value="{{old('title') ?? $event->title}}" class="form-control" id="inline-full-name" type="text" placeholder="Wedding show">
  </div>
</div>
<div class="md:flex md:items-center mb-6">
  <div class="md:w-1/3">
    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
     Location
    </label>
  </div>
  <div class="md:w-2/3">
    <input name="location" value="{{old('location') ?? $event->location}}" class="form-control" id="inline-full-name" type="text" placeholder="Nairobi">
  </div>
</div>
<div class="md:flex md:items-center mb-6">
  <div class="md:w-1/3">
    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
     Date
    </label>
  </div>
  <div class="md:w-2/3">
    <input name="event_date" value="{{old('event_date') ?? $event->event_date}}" class="form-control" id="inline-full-name" type="date" placeholder="12/12/2019">
  </div>
</div>

<div class="md:flex md:items-center mb-6">
  <div class="md:w-1/3">
    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-username">
      Brief description:
    </label>
  </div>
  <div class="md:w-2/3">
    <textarea name="description" rows="5" class="form-control" id="inline-username" type="password" placeholder="******************">
  {{old('description') ?? $event->description}}  </textarea>
  </div>
</div>

<div class="md:flex md:items-center">
  <div class="md:w-1/3"></div>
  <div class="md:w-2/3">
    <button type="submit" class="shadow btn btn-primary">

Save Changes
    </button>
  </div>
</div>
</form>
</div>

@endsection
