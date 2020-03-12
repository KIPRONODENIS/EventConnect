@extends('layouts.app')

@section('body')
<header>
  <div class="overlay"></div>
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
<source src="{{asset('video/light.mp4')}}" type="video/mp4">
  </video>
  <div class="container h-100">
    <div class="d-flex h-100 text-center align-items-center">
      <div class="w-100 text-white">
        <h1 class="display-3" style="color:#ff0066 !important">Event <span class="text-primary">Connect</span></h1>
        <p class="lead mb-0">The best event Service Market Place</p>
       @guest
        <a  href="{{route('register')}}" class="btn btn-primary btn-lg mt-3 rounded shadow">Create an Account</a>
        @else 
   <a  href="{{url('/dashboard')}}" class="btn btn-primary btn-lg mt-3 rounded shadow">Dashboard</a>
        @endguest
      </div>
    </div>
  </div>
</header>

<section class="my-5">
  <div class="container">
    <div class="row">
      <div class="col-md-10 mx-auto">
        <!-- index.html -->
<h2 class="text-4xl font-bold text-center m-4 text-teal-500">
  Featured Service providers
</h2>
        <p class="text-center w-100">The following are a list of featured service provider</p>



<div class="flex flex-wrap mx-3 overflow-hidden">
@foreach( $services as $item)
@component('components.service')

@slot('title')

{{$item->title}}
@endslot

@slot('views')
{{$item->views->count()}}
@endslot
@slot('id')

@slot('image')
{{$item->image}}
@endslot
{{$item->id}}
@endslot

@slot('description')

{{$item->description}}
@endslot

@slot('location')

{{$item->town}}
@endslot

@slot('price')

{{$item->price}}
@endslot

@slot('owner')

{{$item->user->name}}
@endslot


@endcomponent
@endforeach


</div>
<div class="w-100 text-center my-3">
    <a href={{route('services')}} class="mx-auto w-100 bg-teal font-bold rounded-full py-4 px-8 shadow-lg uppercase tracking-wider">
  View All Services
</a>
</div>
      </div>
    </div>
  </div>
</section>






@endsection
