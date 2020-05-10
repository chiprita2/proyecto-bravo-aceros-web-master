<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductFile extends Model
{
    protected $table = 'products_file';
    protected $fillable = ['file'];
}
