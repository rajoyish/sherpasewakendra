<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Artesaos\SEOTools\Facades\SEOMeta;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        SEOMeta::setTitle('Dharmashala’s Rooms');
        $rooms = Room::all();

        return view('guest.rooms.index')->with('rooms', $rooms);
    }

    public function show(Room $room)
    {
        return view('guest.rooms.room', ['room' => $room]);
    }
}
