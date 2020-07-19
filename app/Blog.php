<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 
        'content', 
        'featured_image',
        'published',
        'tag_id'
    ];
}
