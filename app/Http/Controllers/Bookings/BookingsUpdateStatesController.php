<?php

namespace App\Http\Controllers\Bookings;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BookingsUpdateStatesController extends Controller
{
    public function updateStates()
    {
        $todayDate = date('Y-m-d');
        $dateTimeNow = Carbon::now()->addMinute(15)->format('Y-m-d H:i');
        $bookings = Booking::where('date', '=', $todayDate)->get();

        foreach ($bookings as $booking) {
            //$dateTime = Carbon::createFromFormat('Y-m-d H:i', $booking->date.' '. $booking->hour);
            $dateTime = Carbon::parse($booking->date.' '. $booking->hour)->format('Y-m-d H:i');
            if ($booking->state == 'Reservada' || $booking->state == 'En espera') {
                if($dateTimeNow->gt($dateTime)) {
                    $booking->state = 'Perdida';
                    $booking->save();
                }
            }
        }
        return back();

    }
}
