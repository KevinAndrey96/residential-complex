<?php

namespace App\Http\Controllers\Bookings;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingsDetailBookingController extends Controller
{
    public function detailBooking(Request $request)
    {
        if (Auth::user()->hasRole('Resident')) {
            $bookings = Booking::where('service_id', '=', $request->input('service_id'))
                ->where('user_id', '=', Auth::user()->id)->get()->sortByDesc('date');
            return view('bookings.detailBooking', compact('bookings'));
        }

        $bookings = Booking::where('service_id', '=', $request->input('service_id'))->get()->sortByDesc('date');
        return view('bookings.detailBooking', compact('bookings'));
    }
}
