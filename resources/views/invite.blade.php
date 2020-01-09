@extends('layouts.app')

@section('body')

@component('components.form-master')

  <h1 class="text-md text-cyan">Invite Dennis to provide Mceeing service in your event</h1>
  <div class="md:w-2/3">
    <input type="hidden" name="service_id" value="{{$id}}">
  </div>

  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
        Event Title
      </label>
    </div>
    <div class="md:w-2/3">
      <input name="title" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" placeholder="Wedding show">
    </div>
  </div>
  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
        Event Date
      </label>
    </div>
    <div class="md:w-2/3">
      <input name="event_date" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="date" placeholder="12/12/2019">
    </div>
  </div>

  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-username">
        Brief description:
      </label>
    </div>
    <div class="md:w-2/3">
      <textarea name="description" rows="5" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-username" type="password" placeholder="******************">
      </textarea>
    </div>
  </div>

  <div class="md:flex md:items-center">
    <div class="md:w-1/3"></div>
    <div class="md:w-2/3">
      <button type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
        Invite
      </button>
    </div>
  </div>

@endcomponent

@endsection
