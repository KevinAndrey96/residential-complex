<?php

namespace App\Http\Controllers\Bookings;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingsDetailBookingController extends Controller
{
    public function detailBooking(Service $service)
    {

        if (Auth::user()->hasRole('Resident')) {
            $bookings = Booking::where('service_id', '=', $service->id)
                                ->where('user_id', '=', Auth::user()->id)->get()->sortByDesc('date');
            return view('bookings.detailBooking', compact('bookings'));
        }

        $bookings = Booking::where('service_id', '=', $service->id)->get()->sortByDesc('date');
        /*
        foreach ($bookings as $booking) {
            $datetimeNow = Carbon::now();
            $datatimeString = $booking->date.' '.$booking->hour;
            $datetime = Carbon::createFromFormat('Y-m-d H:i:s', $datatimeString, 'America/Bogota');
            $endDataTime = $datetime->addMinute(2);

            if ($datetimeNow->gt($endDataTime)) {
                if ($booking->state == 'Reservada' || $booking->state == 'En espera' ) {
                    $dataBooking['state'] = 'Perdida';
                    Booking::find($booking->id)->update($dataBooking);
                }
            }

        }
        */
        return view('bookings.detailBooking', compact('bookings'));
    }
}
