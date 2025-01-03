<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable=[
        'title',
        'description',
        'category',
        'ingredients',
        'steps',
        'duration',
        'difficulty',
        'image',
        'tags',
        'user_id'
    ];
    

    protected $casts =[
        'ingredients'=>'array',
        'steps'=>'array',
        'tags'=>'array'
    ];
}
