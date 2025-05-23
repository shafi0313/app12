<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    public $name;

    public $id;

    public $options;

    public $label;

    public $edit;

    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  array  $options
     * @param  string  $label
     * @param  string|null  $id
     * @param  \Illuminate\Support\HtmlString|\Illuminate\Support\ViewErrorBag  $attributes
     * @return void
     */
    public function __construct($name, $options = [], $label = null, $id = null, $edit = false)
    {
        $this->name = $name;
        $this->options = $options;
        $this->label = $label;
        $this->id = $id ?? $name;
        $this->edit = $edit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.select');
    }
}
