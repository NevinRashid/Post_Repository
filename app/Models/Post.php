<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
                'title',
                'body',
                'slug',
                'tags',
                'category',
                'meta_description',
                'is_published',
                ];
}
