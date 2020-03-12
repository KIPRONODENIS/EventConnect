<div class="my-3 px-3 w-1/3 overflow-hidden xs:w-full sm:w-full md:w-full lg:w-1/3 xl:w-1/3">
  <!-- Column Content -->
  <div class="max-w-xs rounded overflow-hidden shadow-lg my-2">
    <img class="w-full"  src="/storage/{{$image ?? ''}}" style="min-height: 200px !important" alt="Sunset in the mountains">
    <div class="px-6 py-2">
      <div class="font-bold text-xl mb-2">{{$title ?? $item->title}}
      </div>
 <div class=" text-md my-1"><i class="font-bold fa fa-tags"></i> Price: <span class="text-primary">{{$price ?? $item->title}}</span>
      </div>

    </div>
    <div class="px-6 py-2">
     <i class="fa fa-user"></i>
    <i class="text-blue m-3">Provider:</i><span class="font-bold text-success">{{$owner ?? $item->user->name}}</span>
  
    </div>
        <div class="px-6 py-2">
      <i class="fa fa-map-marker"></i>
    <i class="text-blue m-3">Located at:</i><span class="font-bold text-success">{{$location ?? $item->town}}</span>
  
    </div>
    <div class=" mx-4 px-2 py-1">
      
   <i class="fa fa-eye my-3"></i>  {{$views??0}} views
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
