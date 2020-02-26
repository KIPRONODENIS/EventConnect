<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invitation;
use App\Order;
class VendorController extends Controller
{
    public function index() {



      //what about the invitations
      $invitations=auth()->user()->invitations;

      return view('seller.dashboard',compact('invitations'));
    }


    public function invitation(Invitation $invitation) {

    return view('seller.invitation-view',compact('invitation'));

    }


      public function services() {
        $services=auth()->user()->services;
        return view('seller.services-view',compact('services'));

      }

      public function update(Request $request) {
      $id=$request->id;
      $status=Invitation::find($id);
      $status->status=$request->status;
      $status->save();
      return response()->json($status);
      }
}
