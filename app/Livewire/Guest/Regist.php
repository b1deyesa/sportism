<?php

namespace App\Livewire\Guest;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Regist extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $password_confirmation;

    public function store()
    {
        $this->validate([
            'first_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);
        
        User::create([
            'role_id' => 3,
            'name' => "$this->first_name $this->last_name",
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        return redirect()->route('guest.index')->with('success', 'Success Register');
    }
    
    public function render()
    {
        return view('livewire.guest.regist');
    }
}
