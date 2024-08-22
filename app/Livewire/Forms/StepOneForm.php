<?php

namespace App\Livewire\Forms;

use Illuminate\Validation\Rules\Password;
use Livewire\Form;

class StepOneForm extends Form
{
    public $name = '';
    public $email = '';
    public $phone = '';
    public $password = '';

    public function submit()
    {
        $validatedData = $this->validate();
        $this->fill($validatedData);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['nullable', 'string', 'max:255'],
            'password' => ['nullable', 'string', Password::default()],
        ];
    }
}
