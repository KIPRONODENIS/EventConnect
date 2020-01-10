<div class="my-3 px-3 w-1/3 overflow-hidden xs:w-full sm:w-full md:w-full lg:w-1/3 xl:w-1/3">
  <!-- Column Content -->
  <div class="max-w-xs rounded overflow-hidden shadow-lg my-2">
    <img class="w-full" src="https://tailwindcss.com/img/card-top.jpg" alt="Sunset in the mountains">
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2">{{$title}}</div>
      <p class="text-grey-darker text-base">
      {{$description}}
      </p>
    </div>
    <div class="px-6 py-4">
      <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#Eldoret</span>
      <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#Nakuru</span>
      <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">#Kisumu</span>
    </div>
    <div class=" mx-4 px-2 py-1">
    200 views
    </div>
<div class="d-flex justify-between">
  <a href="{{route('view',$id)}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 m-2 px-4 border border-blue-500 hover:border-transparent mx-5 my-4 rounded">
View
</a>
<a href="{{route('invite',$id)}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-3 m-2 border border-blue-500 hover:border-transparent mx-5 my-4 rounded">
Get it
</a>
</div>
  </div>
</div>
