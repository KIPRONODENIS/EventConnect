<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $guarded=[];
    public function invitations() {
      return $this->hasMany(\App\Invitation::class);
    }

    public function users() {
    return $this->belongsToMany(\App\User::class)->withTimestamps();
    }
}
