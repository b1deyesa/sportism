<?php

namespace App\Livewire\Superadmin\Player;

use App\Models\Team;
use Livewire\Component;

class Read extends Component
{
    public Team $team;
    public $players;
    
    public function mount()
    {
        $this->players = Team::find($this->team->id)->players;
    }
    
    public function render()
    {
        return view('livewire.superadmin.player.read', [
            'team' => $this->team
        ]);
    }
}
