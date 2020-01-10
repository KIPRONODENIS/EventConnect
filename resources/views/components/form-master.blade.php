<form class="w-full max-w-sm mx-auto pt-10" method="post" action="{{route('event.create')}}">

{{csrf_field()}}

{{$slot}}
</form>
