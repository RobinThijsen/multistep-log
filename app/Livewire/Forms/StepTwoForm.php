<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class StepTwoForm extends Form
{
    public $plan_id = null;
    public $is_recurrence_yearly = false;

    public function submit()
    {
        $validatedData = $this->validate();
        $this->fill($validatedData);
    }

    public function rules(): array
    {
        return [
            'plan_id' => ['required', 'numeric', 'exists:plans,id'],
            'is_recurrence_yearly' => ['required', 'boolean'],
        ];
    }
}
