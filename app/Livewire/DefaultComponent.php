<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DefaultComponent extends Component
{
    public $showPassword = false;

    public function toggleShowPassword()
    {
        $this->showPassword = !$this->showPassword;
    }
}
