<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DharmashalaBooking extends Model
{
    use HasFactory;

    public $timestamps = false;

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
}
