<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravelista\Comments\Commenter;
class User extends Authenticatable
{
    use Notifiable,HasRoles,Commenter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function services() {
      return $this->hasMany(\App\Models\Service::class);
    }

    public function invitations() {
      return $this->hasManyThrough(\App\Invitation::class,\App\Models\Service::class);
    }

    public function accounts() {
      return $this->belongsToMany(\App\Account::class)->withTimestamps();
    }
    public function events() {
    return $this->hasMany(\App\Event::class);
    }

    /**
     *
     *Get all viewed services
     *
     */
     public function viewedServices() {
       return $this->morphedByMany('\App\Models\Service','likeable');
     }
}
