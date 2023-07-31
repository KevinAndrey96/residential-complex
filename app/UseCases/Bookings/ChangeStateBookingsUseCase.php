<?php


namespace App\UseCases\Bookings;


use App\Models\Booking;
use App\UseCases\Contracts\Bookings\ChangeStateBookingsUseCaseInterface;
use Illuminate\Http\Request;

class ChangeStateBookingsUseCase implements ChangeStateBookingsUseCaseInterface
{
    public function handle(Request $request): Booking
    {
        $booking = Booking::find($request->input('bookingID'));
        $booking->state = $request->input('newState');
        $booking->save();
        return $booking;
    }
}
