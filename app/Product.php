<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Product extends Model
{
    protected $fillable = ['product_main_id', 'sku', 'name', 'active', 'price', 'sale', 'price_sale'];
    protected $appends = ['priceFormat'];

    public function getPriceFormatAttribute()
    {
        $price = "$" . number_format($this->price, 0, '', '.');
        return $price;
    }


    public function features()
    {
        return $this->belongsToMany(Feature::class, 'features_products')->withTimestamps()->withPivot('value');
    }

    public function orderProduct()
    {
        return $this->hasMany(OrderProduct::class, 'id_product');
    }

    public function stock()
    {
        return $this->hasMany(Stock::class, 'id_product');
    }
}
