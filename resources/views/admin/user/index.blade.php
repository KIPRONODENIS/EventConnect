@extends('layouts.admin')

@section('content')


    <div class="row mt-5 mx-4">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm ">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                      @unless(is_null($user->image))
                      <img src="{{asset('storage/'.$user->image)}}" alt="" class="img-rounded img-thumbnail img-responsive" />

                       @else
                      <img src="http://placehold.it/380x500" alt="" class="img-rounded img-thumbnail img-responsive" />
                        @endunless
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>{{$user->name}}</h4>
                        <h6>ROLE: <cite title="San Francisco, USA">{{$user->roles()->first()->name ??"client"}} <i class="glyphicon glyphicon-map-marker">
                        </i></cite></h6>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>{{$user->email}}
                            <br />

                            <br />
                            Registered at: <i class="glyphicon glyphicon-gift"></i><strong>{{$user->created_at->diffForHumans()}}</strong></p>
                        <!-- Split button -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5">
      <a class="btn btn-success" href="{{route('admin.user.view',$user->id)}}" >view</a>
      <a class="btn btn-primary" href="{{route('admin.user.edit',$user->id)}}"  >Edit</a>
      <a class="btn btn-danger" href="{{route('admin.user.delete',$user->id)}}"  >Delete
      </a></div>
    <div class="card shadow"></div>


</div>


@endsection
