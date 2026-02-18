<?php

namespace App\Livewire\Superadmin\Player;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Delete extends Component
{
    public Team $team;
    public Player $player;
    public $password;
    
    public function destroy()
    {
        $this->validate([
            'password' => 'required'
        ]);
        
        if (!Hash::check($this->password, Auth::user()->password)) {
            $this->addError('password', 'Wrong password');
            return;
        }
        
        $this->team->players()->detach($this->player->id);
        $this->player->delete();
        
        return redirect()->route('superadmin.team.show', ['team' => $this->team])->with('success', 'Success Delete');
    }
    
    public function render()
    {
        return view('livewire.superadmin.delete', [
            'team' => $this->team,
            'player' => $this->player
        ]);
    }
}

