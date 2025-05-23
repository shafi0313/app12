<?php

namespace App\View\Components\Shared;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavItem extends Component
{
    public $route;

    public $icon;

    public $text;

    public $active;

    public function __construct($route, $icon, $text, $active = null)
    {
        $this->route = $route;
        $this->icon = $icon;
        $this->text = $text;
        $this->active = $active;
    }    

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shared.nav-item');
    }
}
