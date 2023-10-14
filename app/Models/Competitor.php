<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Competitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'phone'
    ];

    public function lotteries(): BelongsToMany{
        return $this->belongsToMany(Lottery::class)
                    ->as('ticket')
                    ->withPivot('ticket_number')
                    ->withTimestamps();
    }
}
