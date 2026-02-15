<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Player extends Model
{
    protected $guarded = ['id'];
    
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'team_player');
    }
}
