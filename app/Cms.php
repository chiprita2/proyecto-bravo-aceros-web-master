<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    protected $fillable = ['name', 'description', 'url', 'active', 'title', 'seo_description', 'keywords'];
}
