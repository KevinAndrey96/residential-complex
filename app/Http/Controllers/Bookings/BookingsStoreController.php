<?php

namespace App\Http\Controllers\Bookings;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use App\UseCases\Contracts\Bookings\StoreBookingsUseCaseInterface;
use DateTimeZone;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class BookingsStoreController extends Controller
{
    private StoreBookingsUseCaseInterface $storeBookingsUseCase;

    public function __construct(StoreBookingsUseCaseInterface $storeBookingsUseCase)
    {
        $this->storeBookingsUseCase = $storeBookingsUseCase;
    }

    public function store(Request $request)
    {
        $correct = $this->storeBookingsUseCase->handle($request);

        if ($correct) {
            return redirect('bookings/create')->with('bookingSuccess', 'Reservación hecha');
        }

        return redirect('bookings/create')->with('bookingFail', 'No se pudo hacer la reservación');
    }
}
