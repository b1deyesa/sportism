<?php

namespace App\Livewire\Superadmin\Event;

use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Delete extends Component
{
    public Event $event;
    public $password;
    
    public function destroy()
    {
        $this->validate([
            'password' => 'required'
        ]);
        
        if (!Hash::check($this->password, Auth::user()->password)) {
            $this->addError('password', 'Wrong password');
            return;
        }
        
        $this->event->delete();
        
        return redirect()->route('superadmin.event.index')->with('success', 'Success Delete');
    }
    
    public function render()
    {
        return view('livewire.superadmin.delete', [
            'event' => $this->event
        ]);
    }
}
