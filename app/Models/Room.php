<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


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
}
