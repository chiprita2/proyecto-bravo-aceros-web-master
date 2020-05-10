<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $fillable = ['url', 'title', 'description', 'keywords'];
    //
}
