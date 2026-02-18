<?php

namespace App\Livewire\Superadmin\Player;

use App\Models\Player;
use App\Models\Team;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    
    public Team $team;
    public Player $player;
    public $name;
    public $avatar;
    
    public function mount()
    {
        $this->name = $this->player->name;
        $this->avatar = $this->player->avatar;
    }
    
    public function save()
    {
        $this->validate([
            'name' => 'required'
        ]);
        
        if ($this->player->avatar !== $this->avatar) {
            $avatar = $this->avatar->store('player', 'public');
        }
        
        $this->player->update([
            'name' => $this->name,
            'avatar' => $avatar ?: $this->player->avatar
        ]);
        
        return redirect()->route('superadmin.team.show', ['team' => $this->team])->with('success', 'Success Update');
    }
    
    public function render()
    {
        return view('livewire.superadmin.player.form', [
            'team' => $this->team,
            'player' => $this->player
        ]);
    }
}
