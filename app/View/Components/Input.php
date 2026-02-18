<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $class = null,
        public $label = null,
        public $required = false,
        public $type = 'text',
        public $name = null,
        public $id = null,
        public $value = null,
        public $placeholder = null,
        public $autocomplete = 'off',
        public $autofocus = false,
        public $options = false,
        public $wire = null,
        public $toolbar = 'basic'
    )
    {
        $this->class = $class ? " $class" : null;
        $this->label = $label;
        $this->required = $required;
        $this->type = $type;
        $this->name = $name ?: $this->type;
        $this->id = $id ?: $this->name;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->toolbar = $toolbar;
        $this->autocomplete = $autocomplete;
        $this->autofocus = $autofocus;
        $this->options = is_string($options) && $options !== [] ? json_decode($options, true) : ($options ?? []);
        
        if ($wire) {
            $this->wire = $wire;
            $this->name = $name ?: $this->wire;
            $this->id = $id ?: $this->name;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
