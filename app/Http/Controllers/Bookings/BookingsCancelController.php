<?php

namespace App\Http\Controllers\Bookings;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BookingsCancelController extends Controller
{
    public function cancel(Request $request)
    {

        $booking = Booking::find($request->input('booking_id'));
        $dateTimeString = $booking->date.' '.$booking->hour;
        $dateTime = Carbon::createFromFormat('Y-m-d H:i:s', $dateTimeString, 'America/Bogota');
        $dateTimeNow = Carbon::now();
        $hours = $dateTimeNow->diffInHours($dateTime);

        if ($hours > 6) {
            $booking->state = 'Cancelada';
            $booking->save();

            return redirect('/bookings')->with('cancelSuccess', 'Reservación cancelada');
        }

        return redirect('/bookings')
                        ->with('cancelFail', 'No se pudo cancelar la reservación, recuerde que puede cancelar
                                como maximo 6 horas antes de la fecha fijada');

    }
}
