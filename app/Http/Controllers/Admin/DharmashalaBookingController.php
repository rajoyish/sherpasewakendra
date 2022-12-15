<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DharmashalaBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DharmashalaBookingController extends Controller
{
    public function index()
    {
        $bookings = DharmashalaBooking::with('rooms', 'user')
            ->latest()
            ->paginate(10);

        return view('admin.dharmashala.bookings.index', compact('bookings'));
    }

    public function edit(DharmashalaBooking $booking)
    {
        return view('admin.dharmashala.bookings.edit', compact('booking'));
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
        $request->validate([
            'status' => ['boolean'],
        ]);

        DB::table('dharmashala_bookings')
            ->where('id', $booking->id)
            ->update(['status' => $request->status]);

        return to_route('admin.bookings.index')->with('success', 'The room is booked!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DharmashalaBooking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(DharmashalaBooking $booking)
    {
        $booking->delete();

        return to_route('admin.bookings.index')->with('success', 'The room is deleted and vacant for a booking.');
    }
}
