<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeCurrentTeam($query)
    {
        return $query->where('team_id', \Auth::user()->currentTeam->id);
    }

    public function visitors(): HasMany
    {
        return $this->hasMany(Visitor::class);
    }

    public function countTotalVisitors(): int
    {
        return $this->visitors()->select(['people_amount'])->get()->reduce(function ($carry, $item) {
            return $carry + $item->people_amount;
        }) ?? 0;

    }
}
