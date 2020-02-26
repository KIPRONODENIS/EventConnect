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
						<h2> Your  <b>Services</b></h2>
					</div>
					<div class="col-sm-8">
						<a href="{{route('seller.create_service')}}" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Add New</span></a>

					</div>
                </div>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Service Image</th>
						<th>Service Name</th>
						<th>Date Created</th>
            <th>Invitations</th>

						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
		@foreach($services as $service)
		<tr>
				  <td>{{(int)$loop->index+1}}</td>
				<td><a href="#"><img src="{{asset('storage/'.$service->image)}}" class="shadow border border-gray-100" alt="Avatar" height="200" width="200"> </a></td>
<td>{{$service->title}}</td>
				<td>{{$service->created_at->diffForHumans()}}</td>
<td><span class="status text-success text-md">{{$service->invitations->count()}}</td>

 <td>
<a href="{{route('seller.edit_service',$service->id)}}" class="view text-blue-500 m-2" title="edit details" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
<a href="{{route('seller.delete_service',$service->id)}}" class="view border-red-700 m-2 hover:text-white" title="Delete Details" data-toggle="tooltip"><i class="text-danger fa fa-trash"></i></a></td>
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
