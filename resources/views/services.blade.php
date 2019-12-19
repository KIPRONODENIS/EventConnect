@extends('layouts.app')

@section('body')
<div class="flex flex-wrap mx-3 overflow-hidden py-4">
  <div class=" w-1/6">
    <h1 class="font-bold text-teal-500  p-3 shadow"> Categories</h1>
<ul class=="block border-teal-700 my-3">
<li class="my-3"><a href="#" class="text-blue-700 visited:bg-red-700">Catering</a> </li>
<li class="my-3"><a href="#" class="text-blue-700 visited:bg-red-700">Hall Renting</a> </li>
<li class="my-3"><a href="#" class="text-blue-700 visited:bg-red-700">Supplies</a> </li>
<li class="my-3"><a href="#" class="text-blue-700 visited:bg-red-700">Conference materials</a> </li>


</ul>

  </div>
  <div class="w-2/3 flex flex-wrap">
@foreach( $allServices as $item)
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
</div>
<div class=" inline-block text-center mx-auto py-4 ">

  {{$allServices->links()}}

</div>
@endsection
