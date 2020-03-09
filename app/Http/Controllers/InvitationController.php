<?php

namespace App\Http\Controllers;

use App\Invitation;
use Illuminate\Http\Request;
use App\User;
use App\Event;
use Notification;
use App\Notifications\InvitationSent;
class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all invitations belonging to a user
      return   User::find(3)->invitations;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //get the id
    $id=request()->id;
    session()->put('id',$id);
    //determine the new parameter
    $new=request('new');
  $events=\Auth::user()->events;

    if($new) {
     session()->put('events',true);
     request()->session()->forget('success');
   }else {
      session()->put('events',false);
   }




  return view('invite',compact('id','events'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
$request->validate(['event'=>'required']);
     //recieve the event //
     $event=\App\Event::find($request->event);

//determine if that exist
 $exist=\App\Invitation::where([
    'invited_by'=>Auth()->id(),
      'event_id'=>$event->id,
    'service_id'=>$request->service_id
])->first();

if(empty($exist)) {
  //Create a new invitation and pass in the seevice id and logged in user id
   $invitation=new Invitation([
      'invited_by'=>Auth()->id(),

      'service_id'=>$request->service_id
  ]);
  //use the relationship of event-invitation relatonship to save the invitation
 $saved=$event->invitations()->save($invitation);
 //set the notification details
 $msg="You have successfully invite {$saved->service->user->name} to provide  {$saved->service->title} in your {$event->title}";
//details to be passed to the notification
  $details=['msg'=>$msg,'title'=>'Invitation Sent'];


//send the actual notification
Notification::send(\Auth::user(),new InvitationSent($details));
//checks of its succesful and the set the session
  if($saved) {
    //find out the invitaed user

    alert('success',$msg);
  }
}else {
\Alert::info("Invitation already exist" );
}


      session()->put('events',false);
      //get the id
     $id=$request->service_id;
    //determine the new parameter
     $events=\Auth::user()->events;

  return view('invite',compact('id','events'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function show(Invitation $invitation)
    {
      //return the invitation of the id
      return $invitation;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function edit(Invitation $invitation)
    {
      //return the invitation to be edited
      return view('invitation.edit',compact('invitation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invitation $invitation)
    {
      //select the event related

      //push the changes with input

      //validate the request and update

      //  $invitation->update([$request]);
    }

    public function updateStatus(Request $request, Invitation $invitation)
    {
    $invitation->update(['status'=>$request->status]);
    session()->flash('success','Status Successfully Updated');

    return redirect()->back();
      //select the event related

      //push the changes with input

      //validate the request and update

      //  $invitation->update([$request]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invitation $invitation)
    {
        //
        $invitation->delete();
        session()->flash('success','Deleted Successfully');
        return redirect()->back();
    }
}
