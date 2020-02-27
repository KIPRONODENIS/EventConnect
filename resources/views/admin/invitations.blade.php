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
                        <a class="btn btn-success m-2" href="#" data-toggle="modal" data-target="#myModal{{$invitation->id}}">Update </a>
                        <!-- Button to Open the Modal -->
<!-- <button type="button" class="btn btn-primary" >
  Open modal
</button> -->

<!-- The Modal -->
<div class="modal" id="myModal{{$invitation->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Status</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
  <form method="post" action="{{route('admin.invitation.update',$invitation->id)}}">
    @csrf
    @method('put')
      <div class="modal-body">

    <select name="status" class="custom-select">
      <option selected>Pending</option>
      <option >Accepted</option>
      <option >Rejected</option>

    </select>

      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
  </form>


    </div>
  </div>
</div>

                        <a class="btn btn-danger m-2" href="{{route('admin.invitation.delete',$invitation->id)}}" >Delete</a>
                      </td>
                  </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
