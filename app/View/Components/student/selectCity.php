<?php

namespace App\View\Components\student;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class selectCity extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $identifier)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.student.select-city');
    }
}
