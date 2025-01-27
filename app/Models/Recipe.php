<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
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
        'username',
        'views',
        'likes',
        'user_id'
    ];
    

    protected $casts =[
        'ingredients'=>'array',
        'steps'=>'array',
        'tags'=>'array'
    ];
    
    public function comments(){
        return $this->hasMany(Comment::class, 'recipe_id');
    }
    public function likes()
{
    return $this->hasMany(Like::class, 'recipe_id');
}

public function saves(){
    return $this->hasMany(SavedRecipe::class, 'recipe_id');
}


public function isLikedByUser($userId)
{
    return $this->likes()->where('user_id', $userId)->exists();
}
public function isSavedByUser($userId)
{
    return $this->saves()->where('user_id', $userId)->exists();
}

}
