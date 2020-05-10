<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Freshwork\ChileanBundle\Rut;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password', 'rut', 'phone'
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
  protected $appends = ['rutFormat'];

  public function getRutFormatAttribute()
  {
    $rut = Rut::set($this->rut)->fix()->format();
    return $rut;
  }

  public function order()
  {
    return $this->hasMany(Order::class, 'id_user');
  }
}
