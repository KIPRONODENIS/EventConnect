@extends('layouts.app')


@section('body')
    <div class="w-2/5 mx-auto" id="app">


                       <div class="p-3">

        <div class="d-flex ">
          <div >
            <img src="{{asset('/storage/'.$invitation->service->image)}}"  alt="Avatar" >
            <strong class="text-2xl my-2">Service Name: {{$invitation->service->title}}</strong></div></div>

        <div class="card bg-gray-100 text-xl p-3">Date Requested <strong class="text-teal-500">{{$invitation->created_at->diffForHumans()}}</strong></div>
    <div class="card my-3 shadow "><span class=" text-xl status
    @if($invitation->status=='pending')
    {{"text-warning"}}
    @elseif($invitation->status=="accepted")
    {{"text-success"}}
    @else
    {{"text-danger"}}
    @endif
    ">&bull;</span> {{$invitation->status}}</div>
    <div  class="text-teal-600 text-2xl">Invited By{{$invitation->inviter->name}}</div>

        <example-component :id="{{$invitation->id}}" ></example-component>
  </div>
                  </div>


  @endsection
