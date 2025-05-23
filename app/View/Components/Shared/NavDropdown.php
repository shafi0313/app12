<?php

namespace App\View\Components\Shared;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavDropdown extends Component
{
    public $title;

    public $icon;

    public $id;

    public $submenu;

    public function __construct($title, $icon, $id, $submenu = [])
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->id = $id;
        $this->submenu = $submenu;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shared.nav-dropdown');
    }
}
