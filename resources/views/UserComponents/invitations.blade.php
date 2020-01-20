@if(count($data)>0)
@foreach($data as $value)

@component('SmallComponents.invitation')
@slot('title')
{{$value->service->title}}
@endslot
@slot('event')
{{$value->event->first()->title}}
@endslot
@slot('user')
{{$value->service->user->name}}
@endslot
@slot('date')
{{$value->created_at}}
@endslot

@slot('status')
{{$value->status}}
@endslot
@endcomponent

@endforeach
@else
@component('SmallComponents.noinvitation')@endcomponent
@endif
