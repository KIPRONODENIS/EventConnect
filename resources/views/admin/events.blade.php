@extends('layouts.admin')
@section('content')
<div class="card mb-4">
    <div class="card-header"><i class="fas fa-users"></i> All Events</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Sponsor</th>
                        <th>Location</th>
                        <th>Event Date</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                  <tr>
                      <th>Name</th>
                      <th>Sponsor</th>
                      <th>Location</th>
                      <th>Event Date</th>
                      <th>Description</th>
                      <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
  @foreach($events as $event)
                    <tr>
                      <td>{{$event->title}}</td>
                      <td>{{$event->user->first()->name}}</td>
                      <td>{{$event->location}}</td>
                      <td>{{$event->event_date}}</td>
                      <td>{{$event->description}}</td>
                      <td class="d-flex justify-content-between">
                        <a class="btn btn-success" href="{{route('admin.events.index',$event->id)}}" >view</a>
                        <a class="btn btn-primary" href="{{route('admin.events.edit',$event->id)}}" >Edit</a>
                        <a class="btn btn-danger" href="{{route('admin.events.delete',$event->id)}}" >Delete</a>
                      </td>
                    </tr>
  @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
