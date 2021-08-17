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
use function PHPUnit\Framework\isNull;

class BookingsStoreController extends Controller
{
    private StoreBookingsUseCaseInterface $storeBookingsUseCase;

    public function __construct(StoreBookingsUseCaseInterface $storeBookingsUseCase)
    {
        $this->storeBookingsUseCase = $storeBookingsUseCase;
    }

    public function store(Request $request)
    {
        $alert = $this->storeBookingsUseCase->handle($request);
        return redirect('bookings/create')->with($alert[0],$alert[1]);
    }
}
