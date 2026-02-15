<?php

namespace App\Livewire\Admin\Event;

use App\Models\Category;
use App\Models\Club;
use App\Models\Event;
use App\Models\Team;
use Illuminate\Support\Str;
use Livewire\Component;

class Regist extends Component
{
    public Event $event;
    public $categories;
    public $clubs;
    public $name;
    public $category;
    public $club;
    
    public function mount()
    {
        $this->categories = $this->event->categories->pluck('name', 'id')->toJson();
        $this->clubs = Club::orderBy('name', 'asc')->pluck('name', 'id')->toJson();
    }
    
    public function save()
    {
        $this->validate([
            'name' => 'required',
            'category' => 'required'
        ]);
        
        $category = Category::find($this->category);
        $club = Category::firstOrCreate(
            ['id' => $this->club],
            [
                'name' => $this->name,
                'slug' => Str::slug($this->name)
            ]
        );
        $team = Team::firstOrCreate(
            ['slug' => Str::slug($this->name)],
            [
                'club_id' => $club->id,
                'name' => $this->name
            ]
        );
        
        $team->events()->syncWithoutDetaching([$this->event->id]);
        $team->categories()->syncWithoutDetaching([$category->id]);
        
        return redirect()->route('guest.index')->with('success', 'Success Update');
    }
    
    public function render()
    {
        return view('livewire.admin.event.regist', [
            'event' => $this->event
        ]);
    }
}
