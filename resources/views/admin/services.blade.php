@extends('layouts.admin')
@section('content')
<div class="card mb-4">
    <div class="card-header"><i class="fas fa-users"></i> All Services</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="serviceTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Owner</th>
                        <th>Date Created</th>
                        <th>Price</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                  <tr>
                      <th>Image</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Owner</th>
                      <th>Date Created</th>
                      <th>Price</th>
                      <th>Location</th>
                      <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
@foreach($services as $service)
                  <tr>
                      <td>
<img class="img-thumbnail" src="{{asset('storage/'.$service->image)}}"  height="100" width="100">
                      </td>
                      <td>{{$service->title}}</td>
                      <td>{{$service->description}}</td>
                      <td>{{$service->user->name}}</td>
                      <td>{{$service->created_at}}</td>
                      <td>{{$service->price}}</td>
                      <td>{{$service->town}}</td>
                      <td class="d-flex justify-content-between">

                        <a class="btn btn-primary" href="{{route('admin.service.edit',$service->id)}}" >Edit</a>
                        <a class="btn btn-danger" href="{{route('admin.service.delete',$service->id)}}" >Delete</a>
                      </td>
                  </tr>
  @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
