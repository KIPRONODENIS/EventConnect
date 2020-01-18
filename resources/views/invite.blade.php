@extends('layouts.app')

@section('body')
<div class="d-flex py-5 mx-4">
<div class="col-4 p-3 " >
<h1 class="text-teal-700 uppercase m-3">Select the event</h1>
<form method="post" action="{{route('invite.create')}}">
  {{csrf_field()}}
<input type="hidden" name="service_id" value="{{session('id')}}">
<select name="event" class="form-control m-3 pr-3 lineHeight-40">
 @empty($events)
  <option>Non selected</option>
  @endempty
  @if(!empty($events))
 @foreach($events as $event)
  <option value="{{$event->id}}">{{$event->title}}</option>
  @endforeach

  @else
    <option>No event</option>
  @endif
</select>

<button type="submit" class="btn btn-primary m-3">Send Invitation</button>
@unless(session('events')==true)
<a  href="{{route('invite',[$id??1,'new'])}}" class="btn btn-primary m-3">Add event</a>

@endunless
</form>

</div>
<div class="col-6" >
  @if(session()->has('success'))
  <div class="alert alert-success">{{session('success')}}</div>
  @endif
  @if($errors->any())
  @foreach($errors as $error)
  <div class="alert alert-danger">{{$error}}</div>
  @endforeach
  @endif
@includeWhen(session('events')==true,'components.invite-form',['route'=>route('event.create'),'title'=>"Create Event",'method'=>'','event'=>new \App\Event()])
</div>
</div>


@endsection
