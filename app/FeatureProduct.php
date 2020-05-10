<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureProduct extends Model
{
  protected $fillable = ['feature_id', 'product_id', 'value'];
}

