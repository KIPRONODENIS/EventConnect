@if(count($data)>0)
@foreach($data as $value)

@component('SmallComponents.invitation')
@slot('title')
{{$value->service->title}}
@endslot
@slot('event')

@endslot
@slot('user')
{{$value->service->user->name}}
@endslot
@endcomponent

@endforeach
@else
@component('SmallComponents.noinvitation')@endcomponent
@endif
