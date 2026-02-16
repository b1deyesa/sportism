<?php

namespace App\Livewire\Superadmin\Player;

use App\Models\Player;
use App\Models\Team;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    
    public Team $team;
    public $name;
    public $avatar;
    
    public function save()
    {
        $this->validate([
            'name' => 'required'
        ]);
        
        $avatar = $this->avatar ? $this->avatar->store('player', 'public') : null;
        
        $player = Player::firstOrCreate([
            'name' => $this->name
        ],[
            'avatar' => $avatar
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
