@extends('layouts.app')
@section('body')
<div class=" d-flex m-4 mt-10">
 <div class="col-6 text-center">
<img src="{{asset('storage/pages/page1.jpg')}}" height="400" width="400">
<p class="m-3 text-blue-700 hover:text-teal-200">ServiceProvider:<a>Kiprono Denis</a></p>
 </div>
 <div class="col-6 ">
<h1 class="h1 font-bold text-teal-200">Wedding gown sale</h1>
<div class="d-flex">
<h6 class=" m-3 text-grey-300 float-rigt">Nairobi</h6>
<h6 class=" m-3 text-grey-300 float-rigt">200 views</h6>
</div>
<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
  , sunt in culpa qui officia deserunt mollit anim id est laborum.lorem</p>
<p class=" p-3 bg-blue-300 font-bolder">Fixed Price:<strong>ksh.4000<strong></p>
  <button class="btn btn-success mt-4 p-2">Get this service</button>
 </div>
</div>
<div class="w-100 bg-gray-200 card pl-20">
<h1 class="h4 my-4 uppercase font-bold">Also From <a href="#" class="text-blue-400">kiprono<a></h1>
@component('components.service')

@slot('title')

Gazebos renting
@endslot
@slot('id')

{{1}}
@endslot


@slot('description')
{{Str::limit("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
",100,'...')}}
@endslot

@endcomponent
</div>

@endsection
