<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SummernoteImageJs extends Component
{
    public string $name;

    public ?string $height;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $height = '300px')
    {
        $this->name = $name;
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.summernote-image-js');
    }
}
