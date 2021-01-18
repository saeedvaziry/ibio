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
     * @var
     */
    public $errorBag;

    /**
     * Create a new component instance.
     *
     * @param $type
     * @param string $class
     * @param string $errorBag
     */
    public function __construct($type, $class = "", $errorBag = "")
    {
        $this->type = $type;
        $this->class = $class;
        $this->errorBag = $errorBag;
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
