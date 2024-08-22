<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Login extends DefaultComponent
{
    public $email =  '';
    public $password = '';

    public function submit()
    {
        $validatedData = $this->validate($this->rules(), ['email' => __('auth.email')]);

        $user = User::where('email', $validatedData['email'])->first();

        if (!Hash::check($validatedData['password'], $user->password)) {
            return $this->addError('password', __('auth.password'));
        }

        Auth::login($user);
        $this->redirectRoute('app.dashboard');
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'string'],
        ];
    }

    public function render()
    {
        return view('livewire.login');
    }
}
