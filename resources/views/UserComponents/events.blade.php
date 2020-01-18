<div class="events py-5">
  @if(session()->has('deleted'))
   <div class="alert alert-danger">{{session('deleted')}}</div>
  @endif
<table class="table table-responsive">
<thead>
<tr>
<td>#</td>
<td>Title</td>
<td>Description</td>
<td>Date</td>
<td>Location</td>
<td>Action</td>
</tr>
</thead>
<tbody>
  @if(!empty($data))
  @foreach($data as $value)
  <tr>
  <td>{{$loop->index+1}}</td>
  <td>{{$value->title}}</td>
  <td>{{$value->description}}</td>
  <td>{{$value->event_date}}</td>
  <td>{{$value->location}}</td>
  <td>
    <a href="/event/{{$value->id}}/edit"><span class="fa fa-edit"></span></a>
    <a href="/event/{{$value->id}}"><span class="fa fa-eye"></span></a>
    <a class="d-flex">
      <form action="/event/{{$value->id}}" method="post">
        @csrf
        @method('delete')
      <button class="bg-danger text-white p-2 rounded"><span class="fa fa-trash"></span></button>
    </form>
    </a>
  </td>
</tr>
@endforeach
@else
<tr>
<div class="alert alert-info">{{"No events Yets"}}<button class="btn btn-success m-1">Create Event</button><div>
</tr>
@endif

</tbody>
</table>
</div>
