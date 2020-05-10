<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
  protected $fillable = ['name', 'active'];
  protected $table = 'store';

  public function stock()
  {
    return $this->hasMany(Stock::class, 'id_store');
  }
  public function admin()
    {
        return $this->hasMany(Admin::class, 'id_store');
    }
}
