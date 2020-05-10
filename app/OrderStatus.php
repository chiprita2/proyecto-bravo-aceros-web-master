<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
  protected $table = 'order_status';
  protected $fillable = ['name', 'status'];
  protected  $hidden = [
    'created_at', 'updated_at',
  ];
  public function order()
  {
    return $this->hasMany(Order::class, 'id_order_status');
  }

  public function history()
  {
    return $this->hasMany(OrderHistory::class, 'id_order_status');
  }
}
