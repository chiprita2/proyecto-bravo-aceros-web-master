<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $table = 'orders';
  protected $fillable = [
    'method',
    'shipping_name',
    'shipping_address',
    'info_optional',
    'name',
    'email',
    'billing',
    'phone',
    'total_pay',
    'total_shipping',
    'total_discount',
    'code_uniq',
    'pay',
    'latitude',
    'longitude'
  ];
  protected $appends = ['total'];

  public function getTotalAttribute()
  {
    $price = "$" . number_format($this->total_pay, 0, '', '.');
    return $price;
  }
  public function history()
  {
    return $this->hasMany(OrderHistory::class, 'id_order');
  }

  public function products()
  {
    return $this->hasMany(OrderProduct::class, 'id_order');
  }

  public function stockMovement()
  {
    return $this->hasMany(StockMovement::class, 'id_order');
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'id_user');
  }

  public function status()
  {
    return $this->belongsTo(OrderStatus::class, 'id_order_status');
  }

  public function orderBilling()
  {
    return $this->belongsTo(OrderBilling::class, 'id_order_billing');
  }

  public function zone()
  {
    return $this->belongsTo(Zone::class, 'id_zone');
  }

  public function payment()
  {
    return $this->belongsTo(Payment::class, 'id_payment');
  }
}
