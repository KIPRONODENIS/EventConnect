<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


  /**
   * determine the route and call the relevant functions.
   *@param name of the page it should look for
   * @return \Illuminate\Http\Response
   */
  public function main($name='')
  {
  $user_events=\Auth::user()->events->count();
   $user_invitations=\Auth::user()->invitations->count();
    //give us the data
   $default=empty($name)?true:false;
   //data to be passed
   $data=$this->getdata($name);
   //$name

return view('home')->with(['default'=>$default,'data'=>$data,'name'=>$name,
'user_events'=>$user_events,
'user_invitations'=>$user_invitations,
'user_notifications'=>\Auth::user()->notifications->count()

]);

  }
// get the data
  public function getdata($view) {
    switch($view) {
      case "profile":
//first get the user info
 return \Auth::user();

      break;



      case "events":
      return \Auth::user()->events ?? [];
      break;


      case "invitations":
       return \Auth::user()->invitations ?? [];
      break;
      case "notifications":
       return  ["hhsshsh"];
      break;


      default:
     return [];
      break;
    }
  }


}
