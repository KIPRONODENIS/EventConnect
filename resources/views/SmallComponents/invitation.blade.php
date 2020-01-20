<div class="card p-2 py-4 text-center bg-teal-100 shadow p-4 w-3/4 ml-4 clear-fix rounded my-3">
 <p class='lead py-2'>You have invited <span class="text-teal-700 bold">{{$user}}</span> to provide <span class="text-teal-700 bold">{{$title}}</span> in your <span class="text-teal-700 bold">{{$event}}</span> Event</p>
<div class="info float-right">
<span class="fa fa-clock fa-2x text-xl ago "> {{$date}}</span>
<span class="fa fa-clock fa-2x text-xl ago "><div class="badge @if($status=='pending')
  {{"badge-warning"}}@elseif($status=='approved'){{"badge-success"}}@elseif($status=='rejected'){{"badge-danger"}} @else {{""}}@endif">{{$status}}</div></span>
</div>
</div>
