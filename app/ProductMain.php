<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductMain extends Model
{
  protected $table = 'products_main';
  protected $fillable = ['name', 'title', 'url', 'description', 'description_short', 'seo_description', 'active', 'keywords'];

  public function categories()
  {
    return $this->belongsToMany(Category::class, 'products_main_categories')
      ->withTimeStamps();
  }

  public function images()
  {
    return $this->hasMany(ProductImage::class, 'product_main_id');
  }

  public function files()
  {
    return $this->hasMany(ProductFile::class, 'product_main_id');
  }

  public function product()
  {
    return $this->hasMany(Product::class, 'product_main_id');
  }
}
