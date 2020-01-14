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

    //give us the data
   $default=empty($name)?true:false;
   //data to be passed
   $data=$this->getdata($name);
   //$name

return view('home')->with(['default'=>$default,'data'=>$data,'name'=>$name]);

  }
// get the data
  public function getdata($view) {
    switch($view) {
      case "profile":
//first get the user info
 return \Auth::user();

      break;



      case "events":
     return ["events data"];
      break;


      case "invitations":
     return ["invitations data"];
      break;


      default:
     return [];
      break;
    }
  }


}
