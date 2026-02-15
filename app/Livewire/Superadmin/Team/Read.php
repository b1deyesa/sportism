<?php

namespace App\Livewire\Superadmin\Team;

use App\Models\Club;
use App\Models\Team;
use Livewire\Component;

class Read extends Component
{
    public Club $club;
    public $teams;
    
    public function mount()
    {
        $this->teams = Team::where('club_id', $this->club->id)->orderBy('name', 'asc')->get();
    }
    
    public function render()
    {
        return view('livewire.superadmin.team.read', [
            'club' => $this->club
        ]);
    }
}
