<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public $id;

    public $title;

    public $size;

    public function __construct($id, $title = 'Modal Title', $size = 'xl')
    {
        $this->id = $id;
        $this->title = $title;
        $this->size = 'modal-'.$size;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.modal');
    }
}
