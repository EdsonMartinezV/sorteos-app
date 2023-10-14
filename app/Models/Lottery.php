<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lottery extends Model
{
    use HasFactory;

    protected $fillable = [
        'prize',
        'user_id',
        'is_active'
    ];

    public function competitors(): BelongsToMany{
        return $this->belongsToMany(Competitor::class)
                    ->as('ticket')
                    ->withPivot('ticket_number')
                    ->withTimestamps();
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
