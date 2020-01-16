<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <input type="text"  class="form-control shadow border-blue-200" wire:model="searchTerm" />

    <ul>
      @foreach($users as $user)
  <li >{{$user['name']}}</li>
      @endforeach

    </ul>
</div>
