<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Room extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'price',
        'amenities',
        'photo',
    ];

    protected $casts = ['amenities' => 'json'];

    public function bookings(): BelongsToMany
    {
        return $this->belongsToMany(DharmashalaBooking::class);
    }
}
