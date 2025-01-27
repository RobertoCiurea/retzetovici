<?php

namespace App\View\Components;

use Closure;
use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class RecipesGrid extends Component
{
    /**
     * Create a new component instance.
     */

    public function __construct(public $recipes, public string $title){
        $recipes = $this->recipes;
        $title = $this->title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.recipes-grid');
    }
}
