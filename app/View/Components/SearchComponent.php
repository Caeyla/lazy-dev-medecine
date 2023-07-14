<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\View\Component\selectComponent;
class SearchComponent extends Component
{
    /**
     * Create a new component instance.
     */

    public function __construct(public $modeling,public $model)
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.search-component');
    }
}
