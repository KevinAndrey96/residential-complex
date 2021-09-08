<?php

namespace App\Http\Controllers\Bookings;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\UseCases\Bookings\ChangeStateBookingsUseCase;
use App\UseCases\Contracts\Bookings\ChangeStateBookingsUseCaseInterface;
use Illuminate\Http\Request;

class BookingsChangeStateController extends Controller
{
    private ChangeStateBookingsUseCaseInterface $changeStateBookingsUseCase;

    public function __construct(ChangeStateBookingsUseCaseInterface $changeStateBookingsUseCase)
    {
        $this->changeStateBookingsUseCase = $changeStateBookingsUseCase;
    }

    public function changeState(Request $request)
    {
        $booking = $this->changeStateBookingsUseCase->handle($request);
        return redirect('/detailBooking/'.$booking->service_id);
    }
}
