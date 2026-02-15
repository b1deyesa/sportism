<?php

namespace App\Livewire\Guest;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email;
    public $password;
    public $remember = [0 => false];

    public function authenticate()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt(
            $this->only('email', 'password'),
            $this->remember[0]
        )) {
            $this->addError('email', 'Wrong email or password!');
            return;
        }

        session()->regenerate();
        return redirect()->route('guest.index')->with('success', 'Success Login');
    }

    public function render()
    {
        return view('livewire.guest.login');
    }
}
