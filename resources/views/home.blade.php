@extends('layouts.app')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 py-10">
            <div class="card">
                <div class="card-header bg-white py-4 d-flex justify-between">
                  <div class="w-1/4 card bg-teal-500 shadow text-grey-darkest text-center p-3 hover:bg-white">
                    <div class="amount text-xl text-teal-700 my-2">0</div>
                    <div class="amount  my-2">Events</div>
                  </div>
                  <div class="w-1/4 card bg-white shadow text-center p-3 hover:bg-teal-500">
                    <div class="amount text-xl text-teal-700 my-2">0</div>
                    <h4 class="amount  my-2">Invitations</h4>
                  </div>

                  <div class="w-1/4 card bg-white shadow text-center p-3">
                    <div class="amount text-xl text-teal-700 my-2">0</div>
                    <div class="amount  my-2">Notifications</div>
                  </div>
                </div>

                <div class="card-body font-bold text-grey-500">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                Welcome to your Dashboard
                <div class="row d-flex justify-between m-2 py-5">
                  <ul class="nav nav-pills">
  <li class="nav-item "><a href="{{route('frontend.dashboard','')}}"  class="nav-link active">Home</a></li>
  <li class="nav-item shadow hover:bg-blue-700  rounded mx-2"><a href="{{route('frontend.dashboard','profile')}}" class="nav-link hover:text-white">My profile</a></li>
  <li class="nav-item shadow hover:bg-blue-700  rounded mx-2"><a href="{{route('frontend.dashboard','events')}}"   class="nav-link hover:text-white">View Events</a></li>
  <li class="nav-item shadow hover:bg-blue-700  rounded mx-2"><a href="{{route('frontend.dashboard','invitations')}}"   class="nav-link hover:text-white">View Invitation</a></li>

</ul>

                </div>

                <!-- MAIN Variable section -->

                @if(!$default)
                @include("UserComponents.".$name,$data)
                @else
            @component('components.homecomponent')
             @slot('message'){{"You have 3 notifications"}} @endslot
             @slot('route')
                {{route('frontend.dashboard','')}}
             @endslot
             @slot('routename'){{"View Home"}} @endslot
            @slot('class'){{"btn btn-danger"}} @endslot
            @endcomponent

            @component('components.homecomponent')
             @slot('message'){{"Welcome to EventConnect.Get events services for event in three steps.Start by creating an event."}} @endslot
             @slot('route')
                {{route('frontend.dashboard','')}}
             @endslot
             @slot('routename'){{"Create event"}} @endslot
              @slot('class'){{"btn btn-success"}} @endslot
            @endcomponent

                @endif
                </div>
            </div>
        </div>
    </div>
    <div class="card">

    </div>
</div>

@endsection
