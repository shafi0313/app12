<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public $action;

    public $method;

    public $img;

    public $modal;

    public $ajax;

    /**
     * Create a new component instance.
     *
     * @param  string  $action  The form action URL.
     * @param  string  $method  The form method (GET, POST, etc.).
     * @param  bool|null  $img  Indicates if the form includes a file upload.
     */
    public function __construct($action, $method = 'POST', $img = false, $modal = false, $ajax = false)
    {
        $this->action = $action;
        $this->method = strtoupper($method);
        $this->img = $img;
        $this->modal = $modal;
        $this->ajax = $ajax;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.form');
    }
}
