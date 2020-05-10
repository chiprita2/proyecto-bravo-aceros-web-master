<?php

namespace  App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User  as Authenticatable;

class Admin  extends  Authenticatable  implements JWTSubject
{
  use  Notifiable;

  protected  $fillable = [
    'name', 'surname', 'email', 'password', 'rol', 'id_store'
  ];

  protected  $hidden = [
    'password', 'remember_token',
  ];

  protected  $casts = [
    'email_verified_at' => 'datetime',
  ];

  public  function  getJWTIdentifier()
  {
    return  $this->getKey();
  }

  public  function  getJWTCustomClaims()
  {
    return [];
  }
  public function store()
  {
    return $this->belongsTo(Store::class, 'id_store');
  }
}
