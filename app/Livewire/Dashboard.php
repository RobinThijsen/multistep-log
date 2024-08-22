<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $userConnected;

    public function mount()
    {
        $this->userConnected = Auth::user();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
