<?php

namespace App\Http\Controllers;

use App\Models\Service as services;
use Illuminate\Http\Request;
use App\Like ;
use App\ServiceCategory;
use RealRashid\SweetAlert\Facades\Alert;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services=services::orderBy('id','desc')->with('views')->take(6)->get();

        return view('welcome',compact('services'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showall($category=null)
    {
        //

        $allServices=$category==null?services::orderBy('id','desc')->paginate(6):ServiceCategory::find($category)->services()->paginate(6);

        $categories=\App\ServiceCategory::all();
        return view('services',compact('allServices','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories=ServiceCategory::all();

     return view('seller.service.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validated=  $request->validate([
          'title'=>'required',
          'service_category_id'=>'required',
          'town'=>'required',
          'image'=>'required|file|image',
          'description'=>'required|min:10'
        ]);

    $service=new services([
        'title'=>$request->title,
        'service_category_id'=>$request->service_category_id,
        'town'=>$request->town,
        'description'=>$request->description,
        'image'=>$request->file('image')->store('images',['disk'=>'public'])
    ]);
//save the service

  $saved=auth()->user()->services()->save($service);

  Alert::success('Success', 'Service successfully Created');

  return redirect('/seller/services');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(services $service)
    {
  //  return view('seller.service.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(services $service)
    {
        $categories=ServiceCategory::all();
        return view('seller.service.edit',compact('service','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, services $service)
    {

      $updated=$service->update($request->except(['_token','_method','image']));
      if($request->hasFile('image')) {

        $service->update(['image'=>$request->file('image')->store('images',['disk'=>'public'])]);
      }

    session()->flash('success','Updated successfully');
    return redirect('/seller/services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(services $service)
    {
      $service->delete();
        Alert::success('Success', 'Service Deleted Successfully');

        return redirect('/seller/services');
    }
    /**
     * View  the specified service from storage.
     *
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function view(services $service)
    {
    //FIND THE USER WHO OWNS THE Service
    $services=$service->user->services()->with('views')->orderBy('created_at','desc')->take(3)->get();
   //add  when user views the service
   $this-> handleView('App\Models\Service',$service->id);

      return view('User.profile', compact('service','services'));
    }
    /**
     *create a new view  on a service when user visits for the first time.
     *
     * @param  \App\Models\services  $services
     * void function
     */

    public function handleView($type,$id) {
      //check if user has already viewed


      $exist=Like::whereLikeableType($type)->whereLikeableId($id)->whereUserId(\Auth::id())->first();
    if(is_null($exist)) {
//add the view to likeables table;
      $view= Like::create([
        'user_id'=>\Auth::id(),
        'likeable_id'=>$id,
        'likeable_type'=>$type
      ]);
    }
    }
}
