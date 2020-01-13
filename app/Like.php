<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    protected $table='likeables';
    protected $guarded=[];

    /**
    *Get all of the services

    */

    public function services() {
      return $this->morphedByMany('\App\Models\Service','likeables');
    }
}
