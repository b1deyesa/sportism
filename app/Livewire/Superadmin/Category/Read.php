<?php

namespace App\Livewire\Superadmin\Category;

use App\Models\Event;
use App\Models\Team;
use Illuminate\Support\Str;
use Livewire\Component;

class Read extends Component
{
    public Event $event;
    public $categories;
    public $teams;
    public $selected_category;
    public $selected_team;
    public $team_id;
    
    public function mount()
    {
        $this->categories = Event::find($this->event->id)->categories;
        $this->teams = Team::orderBy('name', 'asc')->pluck('name', 'id')->toJson();
        
        if ($this->categories->isNotEmpty()) {
            $this->selected_category = $this->categories->first()->id;
            
            $firstCategory = $this->categories->first();
            if ($firstCategory->teams->isNotEmpty()) {
                $this->selected_team = $firstCategory->teams->first()->id;
            }
        }
    }
    
    public function selectCategory($id)
    {
        $this->selected_category = $id;

        $category = $this->categories->where('id', $id)->first();
    
        if ($category && $category->teams->isNotEmpty()) {
            $this->selected_team = $category->teams->first()->id;
        } else {
            $this->selected_team = null;
        }
    }
    
    public function selectTeam($id)
    {
        $this->selected_team = $id;
    }

    public function getCategoryProperty()
    {
        return $this->categories->where('id', $this->selected_category)->first();
    }
    
    public function getTeamProperty()
    {
        if (!$this->category) return null;
        return $this->category->teams->where('id', $this->selected_team)->first();
    }
    
    public function saveTeam()
    {
        $this->validate([
            'team_id' => 'required'
        ]);
        
        $team = Team::find($this->team_id);
        
        if (!$team) {
            $this->addError('team_id', "Team doesn't exists.");
            return;
        }
        
        $team->events()->syncWithoutDetaching([$this->event->id]);
        $team->categories()->syncWithoutDetaching([$this->category->id]);
        
        $this->dispatch('modal-close');
        return back()->with('success', 'Success Update');
    }
    
    public function render()
    {
        return view('livewire.superadmin.category.read', [
            'event' => $this->event
        ]);
    }
}