@extends('layouts.app')

@section('body')
 <!-- Hero section -->
 <div class="py-20 bg-teal" style="background: linear-gradient(90deg, #008080 0%, #00cdcd 100%);">

  <div class="container mx-auto px-6">
    <h2 class="text-4xl font-bold mb-2 text-white">
    BUY or SELL  event services here
    </h2>
    <h3 class="text-2xl mb-8 text-gray-200">
    Over thousand event service providers
    </h3>
    <example-component></example-component>
@guest
<a href={{route('register')}} class="bg-white font-bold rounded-full py-4 px-8 shadow-lg uppercase tracking-wider">
  Become a vendor
</a>
<a href={{route('post-event')}} class="bg-white font-bold rounded-full py-4 px-8 shadow-lg uppercase tracking-wider">
Post an event
</a>
@else
<a href={{route('post-event')}} class="bg-red-400 font-bold rounded-full py-4 px-8 shadow-lg uppercase tracking-wider">
Post an event
</a>
<a href={{route('frontend.dashboard')}} class="bg-red-400 font-bold rounded-full py-4 px-8 shadow-lg uppercase tracking-wider">
Dashboard
</a>
@endguest



  </div>
</div>

<!-- index.html -->
<h2 class="text-4xl font-bold text-center m-4 text-teal-500">
  Featured Service providers
</h2>

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

@endcomponent
@endforeach


</div>
<a href={{route('services')}} class="mx-auto w-20 bg-teal font-bold rounded-full py-4 px-8 shadow-lg uppercase tracking-wider">
  View All Services
</a>
@endsection
