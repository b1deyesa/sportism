<?php

namespace App\Livewire\Superadmin\Team;

use App\Models\Club;
use App\Models\Team;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
    public Club $club;
    public $name;
    
    public function save()
    {
        $this->validate([
            'name' => 'required'
        ]);
        
        if (Team::where('slug', Str::slug($this->name))->exists()) {
            $this->addError('name', 'Team already exists!');
            return;
        }
        
        Team::create([
            'club_id' => $this->club->id,
            'name' => $this->name,
            'slug' => Str::slug($this->name)
        ]);
        
        return redirect()->route('superadmin.club.index')->with('success', 'Success Update');
    }
    
    public function render()
    {
        return view('livewire.superadmin.team.form', [
            'club' => $this->club
        ]);
    }
}
