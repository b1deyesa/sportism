<?php

namespace App\Livewire\Superadmin\Club;

use App\Models\Club;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    
    public $name;
    public $logo;
    
    public function save()
    {
        if (Club::where('slug', Str::slug($this->name))->exists()) {
            $this->addError('name', 'Club already exists!');
            return;
        }
        
        $this->validate([
            'name' => 'required'
        ]);
        
        $logo = $this->logo ? $this->logo->store('club', 'public') : null;
        
        Club::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'logo' => $logo
        ]);
        
        return redirect()->route('superadmin.club.index')->with('success', 'Success Update');
    }
    
    public function render()
    {
        return view('livewire.superadmin.club.form');
    }
}
