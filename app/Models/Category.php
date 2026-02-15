<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $guarded = ['id'];

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'event_category');
    }
    
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'category_team');
    }
}
