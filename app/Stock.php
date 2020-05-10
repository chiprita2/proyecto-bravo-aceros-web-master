<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
  protected $fillable = ['saldo'];

  public function stockMovement()
  {
    return $this->hasMany(StockMovement::class, 'id_stock');
  }
  public function store()
  {
    return $this->belongsTo(Store::class, 'id_store');
  }
  public function product()
  {
    return $this->belongsTo(Product::class, 'id_product');
  }
}
