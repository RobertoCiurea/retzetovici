<?php

namespace App\View\Components;

use Closure;
use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class AdminPanel extends Component
{
    /**
     * Create a new component instance.
     */
    public $users;
    public function __construct(public string $title)
    {   
        $this->title = $title;
        $this->users = User::get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-panel', ["users"=>$this->users]);
    }
}
