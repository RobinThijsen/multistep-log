<?php

namespace App\Livewire\Forms;

use App\Models\PlanAddon;
use Livewire\Form;

class StepThreeForm extends Form
{
    public $addons = [];

    public $planAddons = [];

    public function submit()
    {
        $this->planAddons = [];
        $validatedData = $this->validate();
        $this->fill($validatedData);

        foreach ($this->addons as $addon) {
            $this->planAddons[$addon] = PlanAddon::find($addon);
        }
    }

    public function rules(): array
    {
        return [
            'addons' => ['array'],
            'addons.*' => ['required', 'numeric', 'exists:plan_addons,id'],
        ];
    }
}
