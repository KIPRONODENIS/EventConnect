<?php

namespace App\Models;
use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;


class Service extends Model
{
    use Rateable;
    protected $guarded=[];

    public function user() {
      return $this->belongsTo(\App\User::class);
    }

    public function invitations() {
      return $this->hasMany(\App\Invitation::class);
    }
    //
    public function category() {
      return $this->hasMany(\App\ServiceCategory::class);
    }

    /**
  *Get  all views
    */

    public function views(){
      return $this->morphToMany('App\User','likeable');
    }
    /**
  *Check to see whether it has been viewed by authenticated user
    */
    public function getIsViewedAttribute() {
      $view=$this->likes()->whereUserId(Auth::id())->first();
      return(!is_null($like)? true:false);
    }
}
