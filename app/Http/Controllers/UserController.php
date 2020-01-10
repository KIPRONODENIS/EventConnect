<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
class UserController extends Controller
{
  /**
   * contact  the specified user
   *
   * @param  \App\Models\services  $services
   * @return \Illuminate\Http\Response
   */
  public function contact(Service $service)
  {
      return view('User.contact');
  }

}
