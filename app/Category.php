<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','title', 'url', 'active', 'description', 'keywords'];



    public function productMain()
    {
        return $this->belongsToMany(ProductMain::class, 'products_main_categories');
    }
}
