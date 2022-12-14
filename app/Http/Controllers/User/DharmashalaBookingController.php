<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DharmashalaBooking;
use App\Models\Discount;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class DharmashalaBookingController extends Controller
{
    public function index()
    {
        $bookings = DharmashalaBooking::with('rooms')
            ->whereUserId(Auth::id())->get();

        return view('user.dharmashala.bookings.index', compact('bookings'));
    }

    public function create()
    {
        return view('dharmashala.rooms.room');
    }

    public function store(Request $request)
    {
        $request->validate([
            'check_in' => ['required', 'date'],
            'check_out' => ['required', 'date'],
            'amount' => ['numeric'],
            'status' => ['boolean'],
        ]);

        if (DB::table('dharmashala_booking_room')->where('room_id', $request->room_id)->exists()) {
            return to_route('rooms')->with('error', 'Sorry! The room is already booked!');
        }

        if (Auth::user()->is_verified === false) {
            return back()->with('error', 'Sorry! Your account is not verified, please call us at 01-4480529.');
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
        $discount_amount = \Auth::user()->discount->percentage;
        $amount = $total - ($total * ($discount_amount / 100));

        $booking = DharmashalaBooking::create([
            'check_in' => $check_in,
            'check_out' => $check_out,
            'amount' => $amount,
            'user_id' => \Auth::id(),
            'status' => false,
        ]);

        // dharmashala_booking_id
        Auth::user()->bookings();

        // room_id
        $booking->rooms()->attach($request->room_id);

        return to_route('dharmashala.bookings.index')->with('success', 'Booked! Please pay and upload the payment receipt.');
    }

    public function edit(DharmashalaBooking $booking)
    {
        $this->authorize('update', $booking);

        return view('user.dharmashala.bookings.edit', compact('booking'));
    }

    public function update(Request $request, DharmashalaBooking $booking)
    {
        $request->validate([
            'payment_receipt' => [File::image()->max(1024)],
        ]);

        if ($request->hasFile('payment_receipt')) {
            $old_receipt = $booking->payment_receipt;
            if (! empty($old_receipt)) {
                Storage::delete($old_receipt);
            }

            $new_receipt = $request->file('payment_receipt')->store('images/payment-receipts');

            DB::table('dharmashala_bookings')
                ->where('id', $booking->id)
                ->update(['payment_receipt' => $new_receipt]);
        }

        return to_route('dharmashala.bookings.edit', $booking)->with('success', 'The payment receipt is uploaded.');
    }
}
