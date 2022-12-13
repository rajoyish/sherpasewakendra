<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DharmashalaBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DharmashalaBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = DharmashalaBooking::with('rooms', 'user')
            ->latest()
            ->paginate(10);

        $booking_rooms = DB::table('dharmashala_booking_room')
            ->get();

        return view('admin.dharmashala.bookings.index', compact('bookings', 'booking_rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DharmashalaBooking  $dharmashalaBooking
     * @return \Illuminate\Http\Response
     */
    public function show(DharmashalaBooking $dharmashalaBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DharmashalaBooking  $dharmashalaBooking
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(DharmashalaBooking $booking)
    {
        $booking_room = DB::table('dharmashala_booking_room')
            ->where('dharmashala_booking_id', $booking->id)->first();

        return view('admin.dharmashala.bookings.edit', compact('booking_room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DharmashalaBooking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DharmashalaBooking $booking)
    {
        DB::table('dharmashala_booking_room')
            ->where('dharmashala_booking_id', $booking->id)
            ->update([
                'status' => $request->status,
            ]);

        return to_route('admin.bookings.index')->with('success', 'The room is booked!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DharmashalaBooking  $dharmashalaBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(DharmashalaBooking $dharmashalaBooking)
    {
        //
    }
}
