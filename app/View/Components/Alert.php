<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * @var
     */
    public $type;

    /**
     * @var
     */
    public $class;

    /**
     * Create a new component instance.
     *
     * @param $type
     * @param $class
     */
    public function __construct($type, $class = "")
    {
        $this->type = $type;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
