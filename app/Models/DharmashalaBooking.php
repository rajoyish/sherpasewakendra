<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DharmashalaBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'check_in',
        'check_out',
        'amount',
        'user_id',
    ];

    protected $casts = [
        'room_id' => 'int',
        'user_id' => 'int',
        'status' => 'boolean',
        'check_in' => 'date',
        'check_out' => 'date',
        'amount' => 'integer',
    ];

    public function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Room::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
