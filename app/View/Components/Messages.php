<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Messages extends Component
{
    /**
     * Create a new component instance.
     */
    public $messages;
    public string $title;
    public function __construct($messages, $title)
    {
        $this->messages=$messages;
        $this->title=$title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.messages');
    }
}
