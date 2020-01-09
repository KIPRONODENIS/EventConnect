<form class="w-full max-w-sm mx-auto pt-10" method="post" action="{{route('invite.create')}}">
  @if(session()->has('success'))
  <div class="alert alert-success">{{session('success')}}</div>
  @endif
{{csrf_field()}}

{{$slot}}
</form>
