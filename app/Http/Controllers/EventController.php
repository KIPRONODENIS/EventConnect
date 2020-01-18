<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Notification;
use App\Notifications\EventCreatedNotification;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $event=new Event();


        return view('User.post-event',compact('event'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //get the url it will return
   $url=str_replace(url('/'),'',url()->previous('previousUrl'));

   if($url=='/post-event')
   {
     $view="User.post-event";
   }else {
     $view="invite";
   }

      $validated = $request->validate([
        'title'=>'required|min:3|max:40',
        'location'=>'required|min:2|max:20',
        'event_date'=>'required|date',
        'description'=>'required|min:10|max:150'

 ]);

 // if ($validated->fails()) {
 //
 //     return back()->with('errors', $validated->messages()->all()[0])->withInput();
 // }


      //create an event using logged un user
      $event=new \App\Event($validated);
     $event= \Auth::user()->events()->save($event);
     //send the notofication to the database
     Notification::send(\Auth::user(),new EventCreatedNotification(['title'=>$event->title]));

        Alert::success('Success', 'Event created');
      //set the session events to false
      session()->put('events',false);
      //get the id
     $id=$request->service_id;
    //determine the new parameter
     $events=\Auth::user()->events;
     if($url=='/post-event')
     {
        return redirect()->back();
     }
  return view($view,compact('id','events'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
      return view('User.show-event',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
       return view('User.edit-event')->with(['event'=>$event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
      $data=$request->validate([
        'title'=>'required|min:3|max:40',
        'location'=>'required|min:2|max:20',
        'event_date'=>'required|date',
        'description'=>'required|min:10|max:150'

      ]);

    $event->update($data);

    return  redirect()->back()->with('success','updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {

      $event->delete();
      // example:


      toast(" {$event->title}  Deleted sucessfully", 'warning')->autoClose(5000);;

      return redirect()->back();
    }
}
