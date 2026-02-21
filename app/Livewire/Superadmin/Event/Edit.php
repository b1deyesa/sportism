<?php

namespace App\Livewire\Superadmin\Event;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    
    public Event $event;
    public $name;
    public $cover;
    public $description;
    public $status;
    public $date_start;
    public $date_end;
    
    public function mount()
    {
        $this->name = $this->event->name;
        $this->cover = $this->event->cover;
        $this->description = $this->event->description;
        $this->status = $this->event->status;
        $this->date_start = $this->event->date_start;
        $this->date_end = $this->event->date_end;
    }
    
    public function save()
    {
        if (Event::where('slug', Str::slug($this->name))->exists() && $this->event->name !== $this->name) {
            $this->addError('name', 'Event already exists!');
            return;
        }
        
        $this->validate([
            'name' => 'required',
            'status' => 'required',
            'date_start' => 'required',
            'date_end' => 'required'
        ]);
        
        if ($this->event->cover !== $this->cover) {
            $cover = $this->cover->store('event', 'public');
        }
        
        $this->event->update([
            'entered_by' => Auth::user()->id,
            'name' => $this->name,
            'cover' => $cover ?? $this->cover,
            'status' => $this->status,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end
        ]);
        
        return redirect()->route('superadmin.event.index')->with('success', 'Success Update');
    }
    
    public function render()
    {
        return view('livewire.superadmin.event.form', [
            'event' => $this->event
        ]);
    }
}
