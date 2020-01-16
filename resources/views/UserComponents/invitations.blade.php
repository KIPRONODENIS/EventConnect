@if(count($data)>0)
@foreach($data as $value)

@component('SmallComponent.invitation')@endcomponent

@endforeach
@else
@component('SmallComponents.noinvitation')@endcomponent
@endif
