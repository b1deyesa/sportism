<?php

namespace App\Livewire\Superadmin\Category;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
    public Event $event;
    public $name;
    
    public function save()
    {
        $this->validate([
            'name' => 'required'
        ]);
        
        $category = Category::updateOrCreate([
            'slug' => Str::slug($this->name)
        ],[
            'name' => $this->name
        ]);
        
        $category->events()->syncWithoutDetaching([$this->event->id]);
        
        return redirect()->route('superadmin.event.show', ['event' => $this->event])->with('success', 'Success Update');
    }
    
    public function render()
    {
        return view('livewire.superadmin.category.form', [
            'event' => $this->event
        ]);
    }
}
