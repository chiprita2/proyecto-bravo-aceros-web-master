<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
  protected $fillable = ['name', 'status', 'price'];
  protected $appends = ['priceFormat'];

  public function getPriceFormatAttribute()
  {
    $price = "$" . number_format($this->price, 0, '', '.');
    return $price;
  }

  public function order()
  {
    return $this->hasMany(Payment::class, 'id_zone');
  }
}
