<?php

namespace App\Livewire\Superadmin\Club;

use App\Models\Club;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
    public $name;
    
    public function save()
    {
        if (Club::where('slug', Str::slug($this->name))->exists()) {
            $this->addError('name', 'Club already exists!');
            return;
        }
        
        $this->validate([
            'name' => 'required'
        ]);
        
        Club::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name)
        ]);
        
        return redirect()->route('superadmin.club.index')->with('success', 'Success Update');
    }
    
    public function render()
    {
        return view('livewire.superadmin.club.form');
    }
}
