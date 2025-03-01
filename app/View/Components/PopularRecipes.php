<?php

namespace App\View\Components;

use App\Models\Recipe;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class PopularRecipes extends Component
{
    /**
     * Create a new component instance.
     */
    public  $recipes;
    public function __construct(public int $limit = 6)
    {
        $this->recipes =Recipe::orderBy('views', 'desc')->limit($limit)->get();
  
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.popular-recipes', ["recipes"=>$this->recipes]);
    }
}
