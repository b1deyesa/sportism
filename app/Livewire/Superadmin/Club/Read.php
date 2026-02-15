<?php

namespace App\Livewire\Superadmin\Club;

use App\Models\Club;
use Livewire\Component;

class Read extends Component
{
    public $clubs;
    
    public function mount()
    {
        $this->clubs = Club::orderBy('name', 'asc')->get();
    }
    
    public function render()
    {
        return view('livewire.superadmin.club.read');
    }
}
