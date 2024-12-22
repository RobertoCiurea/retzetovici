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
    public int $views;
    public int $likes;
    public int $duration;
    public function __construct($image, $title, $category, $views, $likes, $duration)
    {
        $this->image =$image;
        $this->title =$title;
        $this->category =$category;
        $this->views =$views;
        $this->likes =$likes;
        $this->duration =$duration;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.recipe-card');
    }
}
