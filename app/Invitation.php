<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    //
    protected $guarded=[];

    public function service() {
      return $this->belongsTo(\App\Models\Service::class);
    }

    //
    public function event() {
      return $this->belongsTo(\App\Event::class);
    }

}
