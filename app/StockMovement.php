<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
  protected $fillable = ['description', 'value', 'saldo'];
  protected $table = 'stocks_movement';

  public function provider()
  {
    return $this->belongsTo(Provider::class, 'id_provider');
  }
  public function order()
  {
    return $this->belongsTo(Order::class, 'id_order');
  }
  public function stock()
  {
    return $this->belongsTo(Stock::class, 'id_stock');
  }
}
