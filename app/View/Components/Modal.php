<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Modal extends Component
{
    /**
     * Create a new component instance.
     */
    public string $openButton;
    public string $openButtonStyles;

    public function __construct($openButton, $openButtonStyles)
    {
            $this->openButton = $openButton;
            $this->openButtonStyles=$openButtonStyles;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
