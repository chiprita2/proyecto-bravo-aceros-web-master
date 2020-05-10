<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    protected $table = 'products_image';
    protected $fillable = ['photo'];
    protected $appends = ['image'];

    public function getImageAttribute()
    {
        return Storage::url("product/{$this->photo}");
    }
    
}
