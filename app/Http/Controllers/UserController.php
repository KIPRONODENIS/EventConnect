<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\User;
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
  /**
   * update  the specified user
   *
   * @param  \App\Models\services  id
   * @return \Illuminate\Http\Response
   */
public function update(Request $request) {
    $id=$request->id;
    $name=$request->name;
    $value=$request->value;
    $updated=User::find($id)->update(["{$name}"=>$value]);
    $message=$updated?"success":"0";
  return response()->json(['message'=>$message]);
}


public function view(User $user) {
return view('admin.user.index',compact('user'));
}

public function edit(User $user) {
return view('admin.user.edit',compact('user'));
}

public function updateByAdmin(Request $request, User $user) {

$request->validate([
  'name'=>'required',
  'email'=>'required',
  'role'=>'required'

]);

$user->name=$request->name;
$user->email=$request->email;
$user->assignRole($request->role);

if($request->hasFile('image')) {
  $user->image=$request->image->store('users',['disk'=>'public']);
}

$user->save();
session()->flash('success',"Updated Successfully");

return redirect()->route('admin.user.view',$user->id);
}

public function destroy(User $user) {
$user->delete();
session()->flash('success',"successfully deleted");

return redirect('/admin');
}

}
