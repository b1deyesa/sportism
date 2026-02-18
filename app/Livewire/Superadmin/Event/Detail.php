<?php

namespace App\Livewire\Superadmin\Event;

use App\Models\Event;
use Livewire\Component;

class Detail extends Component
{
    public Event $event;
    public $description;
    public $address;
    public $payment_info;
    
    public function mount()
    {
        $this->description = $this->event->description;
        $this->address = $this->event->address;
        $this->payment_info = $this->event->payment_info;
    }
    
    public function save()
    {
        $this->event->update([
            'description' => $this->description,
            'address' => $this->address,
            'payment_info' => $this->payment_info
        ]);
        
        return redirect()->route('superadmin.event.show', ['event' => $this->event])->with('success', 'Success Update');
    }
    
    public function render()
    {
        return view('livewire.superadmin.event.detail', [
            'event' => $this->event
        ]);
    }
}
