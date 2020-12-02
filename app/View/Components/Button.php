<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    /**
     * @var
     */
    public $type;

    /**
     * @var bool
     */
    public $full;

    /**
     * Create a new component instance.
     *
     * @param $type
     * @param bool $full
     */
    public function __construct($type, $full = false)
    {
        $this->type = $type;
        $this->full = $full;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.button');
    }
}
