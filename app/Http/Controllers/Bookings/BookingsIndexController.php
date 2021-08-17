<?php

namespace App\Http\Controllers\Bookings;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use App\UseCases\Contracts\Bookings\IndexBookingsUseCaseInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingsIndexController extends Controller
{
    private IndexBookingsUseCaseInterface $indexBookingsUseCase;

    public function __construct(IndexBookingsUseCaseInterface $indexBookingsUseCase)
    {
        $this->indexBookingsUseCase = $indexBookingsUseCase;
    }

    public function index()
    {
        $services = $this->indexBookingsUseCase->handle();
        return view('bookings.index', compact('services'));
    }
}
