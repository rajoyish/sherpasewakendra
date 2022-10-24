<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Artesaos\SEOTools\Facades\SEOMeta;

class RoomController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Dharmashala’s Rooms');
        $rooms = Room::all();

        return view('rooms.index')->with('rooms', $rooms);
    }
}
