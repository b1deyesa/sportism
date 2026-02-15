<?php

namespace App\Livewire\Superadmin\Event;

use App\Models\Event;
use Livewire\Component;

class Read extends Component
{
    public $events;
    
    public function mount()
    {
        $this->events = Event::orderBy('order')->get();
    }

    public function updateOrder($orders)
    {
        foreach ($orders as $item) {
            Event::where('id', $item['id'])->update(['order' => $item['order']]);
        }
    }
    
    public function render()
    {
        return view('livewire.superadmin.event.read');
    }
}
