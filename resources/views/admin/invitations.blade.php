@extends('layouts.admin')
@section('content')
<div class="card mb-4">
    <div class="card-header"><i class="fas fa-users"></i> All Invitations</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Event</th>
                        <th>Service</th>
                        <th>Event Planner</th>
                        <th> Provider</th>
                        <th>Status</th>
                        <th>created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                  <tr>
                      <th>Event</th>
                      <th>Service</th>
                      <th>Event Planner</th>
                      <th> Provider</th>
                      <th>Status</th>
                      <th>created at</th>
                      <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($invitations as $invitation)

                  <tr>
                      <td>{{$invitation->event->first()->title}}</td>
                      <td>{{$invitation->service->first()->title}}</td>
                      <td>{{$invitation->inviter->first()->name}}</td>
                      <td> {{$invitation->provider->first()->name}}</td>
                      <td>{{$invitation->status}}</td>
                      <td>{{$invitation->created_at}}</td>
                      <td class="d-flex justify-content-between">
                        <a class="btn btn-success" href="#" >view</a>
                        <a class="btn btn-primary" href="#" >Edit</a>
                        <a class="btn btn-danger" href="#" >Delete</a>
                      </td>
                  </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
