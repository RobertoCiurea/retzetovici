<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ReportCard extends Component
{
    public int $id;
    public string $title;
    public string $name;
    public string $email;
    public $date;
    public string $status;
    public string $image;

    public function __construct($id, $title, $name, $email, $date, $status, $image)
    {
        $this->id=$id;
        $this->title =$title;
        $this->email =$email;
        $this->name =$name;
        $this->date=$date;
        $this->status =$status;
        $this->image =$image;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.report-card');
    }
}
