<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class RecipeCard extends Component
{
    /**
     * Create a new component instance.
     */
    public string $image;
    public string $title;
    public string $category;
    public string $username;
    public string $date;
    public string $difficulty;
    public int $id;
    public int $views;
    public int $likes;
    public int $duration;
    public array $ingredients;
    public array $tags;
    public function __construct($id, $image, $title, $category, $username, $date, $difficulty, $views, $likes, $duration, $tags, $ingredients)
    {
    
        $this->image =$image;
        $this->id = $id;
        $this->title =$title;
        $this->category =$category;
        $this->views =$views;
        $this->username = $username;
        $this->difficulty = $difficulty;
        $this->date = $date;
        $this->likes =$likes;
        $this->duration =$duration;
        $this->ingredients = $ingredients;
        $this->tags = $tags;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.recipe-card');
    }
}
