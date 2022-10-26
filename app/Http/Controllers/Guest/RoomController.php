<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Artesaos\SEOTools\Facades\SEOMeta;

class RoomController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Dharmashala’s Rooms');
        $rooms = Room::all();

        return view('guest.rooms.index')->with('rooms', $rooms);
    }
}
