<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $type;

    public $class;

    public $text;

    /**
     * Create a new component instance.
     *
     * @param  string  $type  The button type (default: "button").
     * @param  string  $class  Additional classes for the button.
     * @param  string  $text  The button text.
     */
    public function __construct(
        $type = 'button',
        $class = '',
        $text = ''
    ) {
        $this->type = $type;
        $this->class = $class;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.button');
    }
}
