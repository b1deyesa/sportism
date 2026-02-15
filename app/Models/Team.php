<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    protected $guarded = ['id'];
    
    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class, 'club_id');
    }
    
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_team');
    }
    
    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'event_team');
    }
    
    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class, 'team_player');
    }
}
