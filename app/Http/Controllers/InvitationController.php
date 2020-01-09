<?php

namespace App\Http\Controllers;

use App\Invitation;
use Illuminate\Http\Request;
use App\User;
use App\Event;
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
    $id=request()->id;
  return view('invite',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //create an event
      $event=Event::create(request()->except('service_id'));

      //Create a new invitation and pass in the seevice id and logged in user id
       $invitation=new Invitation([
          'invited_by'=>Auth()->id(),
          'service_id'=>request()->service_id
      ]);
      //use the relationship of event-invitation relatonship to save the invitation
     $saved=$event->invitations()->save($invitation);

//checks of its succesful and the set the session
      if($saved) {
        //find out the invitaed user

        session()->flash('success',"You have {$saved->service->user->name} to provide  {$saved->service->title}");
      }

      return redirect()->back();
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
    }
}
