<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public $method_name;
    
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $class = null,
        public $id = null,
        public $action = null,
        public $method = 'GET',
        public $enctype = null
    )
    {
        $this->class = $class ? " $class" : null;
        $this->id = $id;
        $this->action = $action;
        $this->enctype = $enctype;
        
        if ($method == 'PUT') {
            $this->method = 'POST';
            $this->method_name = 'PUT';
        } elseif ($method == 'DELETE') {
            $this->method = 'POST';
            $this->method_name = 'DELETE';
        } else {
            $this->method = $method;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form');
    }
}
