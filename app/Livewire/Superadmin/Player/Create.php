<?php

namespace App\Livewire\Superadmin\Player;

use App\Models\Player;
use App\Models\Team;
use Livewire\Component;

class Create extends Component
{
    public Team $team;
    public $name;
    
    public function save()
    {
        $this->validate([
            'name' => 'required'
        ]);
        
        $player = Player::firstOrCreate([
            'name' => $this->name
        ]);
        
        $player->teams()->syncWithoutDetaching([$this->team->id]);
        
        return redirect()->route('superadmin.team.show', ['team' => $this->team])->with('success', 'Success Update');
    }
    
    public function render()
    {
        return view('livewire.superadmin.player.form', [
            'team' => $this->team
        ]);
    }
}
