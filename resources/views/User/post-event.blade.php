@extends('layouts.app')
@section('body')
@include('components.invite-form',['route'=>route('event.create'),'title'=>"Add New Event",'method'=>"post"])
@endsection
