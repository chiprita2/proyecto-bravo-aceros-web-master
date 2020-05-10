<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['name','active'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'features_products');
    }
}
