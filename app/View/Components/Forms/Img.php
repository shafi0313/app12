<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Img extends Component
{
    public $dir;

    public $name;

    public $edit;

    /**
     * Create a new component instance.
     */
    public function __construct($dir, $name, $edit)
    {
        $this->dir = $dir;
        $this->name = $name;
        $this->edit = $edit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.img');
    }
}
