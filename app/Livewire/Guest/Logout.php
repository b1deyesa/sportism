<?php

namespace App\Livewire\Guest;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        Auth::logout();
        
        return redirect()->route('guest.index')->with('success', 'Success Logout');
    }
    
    public function render()
    {
        return view('livewire.guest.logout');
    }
}
