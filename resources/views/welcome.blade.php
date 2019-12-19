@extends('layouts.app')

@section('body')
 <!-- Hero section -->
 <div class="py-20 bg-teal" style="background: linear-gradient(90deg, #008080 0%, #00cdcd 100%);"
>
  <div class="container mx-auto px-6">
    <h2 class="text-4xl font-bold mb-2 text-white">
      FIND YOUR EVENT SERVICES HERE
    </h2>
    <h3 class="text-2xl mb-8 text-gray-200">
    Over thousand event service providers
    </h3>

    <button class="bg-white font-bold rounded-full py-4 px-8 shadow-lg uppercase tracking-wider">
      Get Started
    </button>
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

@slot('id')

{{$item->id}}
@endslot

@slot('description')

{{$item->description}}
@endslot

@endcomponent
@endforeach


</div>
@endsection
