<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    protected $guarded = ['id'];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'entered_by');
    }
    
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'event_category');
    }
    
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'event_team');
    }
}
