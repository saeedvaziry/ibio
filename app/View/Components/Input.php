<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * @var
     */
    public $type;

    /**
     * @var
     */
    public $label;

    /**
     * @var
     */
    public $name;

    /**
     * @var
     */
    public $value;

    /**
     * @var
     */
    public $maxLength;

    /**
     * @var bool
     */
    public $ltr;

    /**
     * @var bool
     */
    public $disabled;

    /**
     * @var string
     */
    public $classList;

    /**
     * @var
     */
    public $placeholder;

    /**
     * @var
     */
    public $help;

    /**
     * @var
     */
    public $model;

    /**
     * @var
     */
    public $required;

    /**
     * Create a new component instance.
     *
     * @param $type
     * @param $label
     * @param $name
     * @param $value
     * @param bool $maxLength
     * @param bool $ltr
     * @param bool $disabled
     * @param string $classList
     * @param string $placeholder
     * @param string $help
     * @param string $model
     * @param string $required
     */
    public function __construct($type, $label, $name, $value = null, $maxLength = false, $ltr = false, $disabled = false, $classList = '', $placeholder = '', $help = '', $model = '', $required = false)
    {
        $this->type = $type;
        $this->label = $label;
        $this->name = $name;
        $this->value = $value;
        $this->maxLength = $maxLength;
        $this->ltr = $ltr;
        $this->disabled = $disabled;
        $this->classList = $classList;
        $this->placeholder = $placeholder;
        $this->help = $help;
        $this->model = $model;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.input');
    }
}
