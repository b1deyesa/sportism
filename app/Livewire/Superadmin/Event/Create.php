<?php

namespace App\Livewire\Superadmin\Event;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $description;
    public $date_start;
    public $date_end;
    
    public function save()
    {
        if (Event::where('slug', Str::slug($this->name))->exists()) {
            $this->addError('name', 'Event already exists!');
            return;
        }
        
        $this->validate([
            'name' => 'required',
            'date_start' => 'required',
            'date_end' => 'required'
        ]);
        
        Event::create([
            'entered_by' => Auth::user()->id,
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'date_start' => $this->date_start,
            'date_end' => $this->date_end
        ]);
        
        return redirect()->route('superadmin.event.index')->with('success', 'Success Update');
    }
    
    public function render()
    {
        return view('livewire.superadmin.event.form');
    }
}
