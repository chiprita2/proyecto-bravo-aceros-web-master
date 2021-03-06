<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
  protected $fillable = ['name', 'status', 'description'];

  
  public function order()
  {
    return $this->belongsTo(Order::class, 'id_order');
  }
}
