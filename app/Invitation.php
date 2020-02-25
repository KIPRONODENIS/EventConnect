<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Invitation extends Model
{
    //
    protected $guarded=[];

    public function service() {
      return $this->belongsTo(\App\Models\Service::class,'service_id');
    }
    //who innvited
    public function inviter() {
      return $this->belongsTo(\App\User::class,'invited_by');
    }

    //
    public function getEventAttribute() {
      return \App\Event::where('id',$this->event_id)->get();
    }

    //scope to give invitaions belonging to
    //logged in service seeker
    public function scopeMysentinvitations($query) {
    return $query->where('invited_by',\Auth::id());
    }
// //get the invited user
//     public function getInviteduserAttribute()
//     {
//         //do whatever you want to do
//         $service= $this->service->user_id;
//         $user=User::find($service);
//         return $user;
//     }

    public function user()
    {
    return $this->hasOne('App\User', 'id', 'invited_by');
    }



}
