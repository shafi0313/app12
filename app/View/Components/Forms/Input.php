<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $type;
    public $name;
    public $id;
    public $label;
    public $placeholder;
    public $value;
    public $required;
    public $edit;

    public function __construct(
        string $name,
        string $type = 'text',
        string $id = null,
        string $label = null,
        string $placeholder = null,
        $value = null,
        $required = null,
        $edit = null
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->id = $id ?? $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->value = $value ?? $edit->{$name} ?? null;
        $this->required = $required;
        $this->edit = $edit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.input');
    }
}
