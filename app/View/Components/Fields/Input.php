<?php

namespace App\View\Components\Fields;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $hardType;
    public $type;
    public $fieldName;
    public $fieldKey;
    public $livewire;
    public $livewireMode;
    public $required;
    public $label;
    public $placeholder;
    public $value;
    public $showPassword;

    /**
     * Create a new component instance.
     */
    public function __construct($fieldName, $fieldKey, $type = "text", $livewire = true, $livewireMode = "blur", $required = false, $label = false, $placeholder = false, $value = false, $showPassword = false)
    {
        $this->hardType = $type;
        $this->type = $type;
        $this->fieldName = $fieldName;
        $this->fieldKey = $fieldKey;
        $this->livewire = $livewire;
        $this->livewireMode = $livewireMode;
        $this->required = $required;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->showPassword = $showPassword;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fields.input');
    }
}
