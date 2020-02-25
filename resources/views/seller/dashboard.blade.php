@extends('layouts.app')

@section('other')

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<script type="text/javascript">
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
@endsection
@section('body')
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
						<h2> Recieved Invitations <b>Details</b></h2>
					</div>
					<div class="col-sm-8">
						<a href="#" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Refresh List</span></a>

					</div>
                </div>
            </div>
			<!-- <div class="table-filter">
				<div class="row">
                    <div class="col-sm-3">
						<div class="show-entries">
							<span>Show</span>
							<select class="form-control">
								<option>5</option>
								<option>10</option>
								<option>15</option>
								<option>20</option>
							</select>
							<span>entries</span>
						</div>
					</div>
                    <div class="col-sm-9">
						<button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
						<div class="filter-group">
							<label>Name</label>
							<input type="text" class="form-control">
						</div>
						<div class="filter-group">
							<label>Location</label>
							<select class="form-control">
								<option>All</option>
								<option>Berlin</option>
								<option>London</option>
								<option>Madrid</option>
								<option>New York</option>
								<option>Paris</option>
							</select>
						</div>
						<div class="filter-group">
							<label>Status</label>
							<select class="form-control">
								<option>Any</option>
								<option>Delivered</option>
								<option>Shipped</option>
								<option>Pending</option>
								<option>Cancelled</option>
							</select>
						</div>
						<span class="filter-icon"><i class="fa fa-filter"></i></span>
                    </div>
                </div>
			</div> -->
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
						<th>Location</th>
						<th>Invited Date</th>
                        <th>Status</th>
						<th>Invited BY</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>

								@foreach($invitations as $invitation)
                    <tr>
                        <td>{{(int)$loop->index+1}}</td>
                        <td class="d-flex "><a href="#"><img src="{{asset('/storage/'.$invitation->service->image)}}"  alt="Avatar" height="100" width="100"> {{$invitation->service->title}}</a></td>
						<td>London</td>
                        <td>{{$invitation->created_at->diffForHumans()}}</td>
						<td><span class="status
             @if($invitation->status=='pending')
						 {{"text-warning"}}
						 @elseif($invitation->status=="accepted")
						 {{"text-success"}}
						 @else
						 {{"text-danger"}}
						 @endif
							">&bull;</span> {{$invitation->status}}</td>
						<td>{{$invitation->inviter->name}}</td>
						<td><a href="/seller/invitation/{{$invitation->id}}" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>
                    </tr>
           @endforeach




                </tbody>
            </table>
			<!-- <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item active"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">6</a></li>
					<li class="page-item"><a href="#" class="page-link">7</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div> -->
        </div>
    </div>
@endsection
