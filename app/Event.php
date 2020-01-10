<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $guarded=[];
    public function invitations() {
      return $this->hasMany(\App\Invitation::class);
    }

    public function user() {
    return $this->belongsTo(\App\User::class);
    }
}
