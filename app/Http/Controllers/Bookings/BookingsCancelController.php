<?php

namespace App\Http\Controllers\Bookings;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\UseCases\Contracts\Bookings\CancelBookingsUseCaseInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BookingsCancelController extends Controller
{
    private CancelBookingsUseCaseInterface $cancelBookingsUseCase;

    public function __construct(CancelBookingsUseCaseInterface $cancelBookingsUseCase)
    {
        $this->cancelBookingsUseCase = $cancelBookingsUseCase;
    }

    public function cancel(Request $request)
    {
        $alert = $this->cancelBookingsUseCase->handle($request);
        return redirect('/detailBooking/'.$alert[2]->service_id)->with($alert[0], $alert[1]);
    }
}
