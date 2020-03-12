@extends('layouts.app')
@section('body')
<div class=" d-flex m-4 mt-10">
 <div class="col-6 text-center">

<img src=" {{asset('/storage/'.$service->image)}}" height="400" width="400">
<p class="m-3 text-blue-700 hover:text-teal-200">ServiceProvider:<a href="/user/{{$service->id}}">{{$service->user->name}}</a></p>
 </div>
 <div class="col-6 ">
<h1 class="h1 font-bold text-teal-200">{{$service->title}}</h1>
<div class="d-flex">
<h6 class=" m-3 text-grey-300 float-rigt">{{$service->town}}</h6>
<h6 class=" m-3 text-grey-300 float-rigt">{{$service->views->count()}} views</h6>
</div>
<p class="lead">{{$service->description}}</p>
<p class=" p-3 bg-blue-300 font-bolder">Fixed Price:<strong>{{$service->price}}<strong></p>
  <a href="{{route('invite',$service->id)}}" class="btn btn-success mt-4 p-2">Get this service</a>
 </div>
</div>
<div class="w-50 mt-3 bg-gray-200 card pl-20">


	@comments(['model' => $service])

</div>

@endsection
