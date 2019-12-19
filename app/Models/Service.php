<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $guarded=[];

    public function user() {
      return $this->belongsTo(\App\User::class);
    }

    public function invitations() {
      return $this->hasMany(\App\Invitation::class);
    }
}
