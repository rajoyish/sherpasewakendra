<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DharmashalaBooking;
use App\Models\Discount;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DharmashalaBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('dharmashala.rooms.room');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'check_in' => ['required', 'date'],
            'check_out' => ['required', 'date'],
            'amount' => ['numeric'],
        ]);

        if (DharmashalaBooking::where('room_id', $request->room_id)->exists()) {
            return to_route('rooms')->with('error', 'Sorry! The room is already booked!');
        }

        if (Auth::user()->is_verified === false) {
            return back()->with('error', 'Sorry! Your account is not verified, please call us to do so.');
        }

        //        Days based on check in & check out
        $check_in = Carbon::parse($request->check_in);

        // abort if user check-ins in the past
        if ($check_in->lessThan(today())) {
            return back()->with('error', 'Sorry! you cannot check-in the past.');
        }

        $check_out = Carbon::parse($request->check_out);
        $days = $check_out->diffInDays($check_in);

        //        Rounding up to 1 if user chooses the same date
        $days = $days == 0 ? 1 : $days;

        //      Total price
        $room = Room::find($request->room_id);
        $price = $room->price;
        $total = $days * $price;

        //        Total amount with discount
        $discount_id = Auth::user()->discount_id;
        $discount = Discount::find($discount_id);
        $discount_amount = $discount->percentage;
        $amount = $total - ($total * ($discount_amount / 100));

        DharmashalaBooking::create([
            'room_id' => $request->room_id,
            'check_in' => $check_in,
            'check_out' => $check_out,
            'amount' => $amount,
            'status' => false,
            'user_id' => \Auth::id(),
        ]);

        return to_route('user.dashboard')->with('success', 'Booked! Please pay the invoice to get confirmed.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DharmashalaBooking  $dharmashalaBooking
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('dharmashala.bookings.room', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DharmashalaBooking  $dharmashalaBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(DharmashalaBooking $dharmashalaBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DharmashalaBooking  $dharmashalaBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DharmashalaBooking $dharmashalaBooking)
    {
        //
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
