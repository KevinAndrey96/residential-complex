<?php

namespace App\Http\Controllers\Bookings;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\UseCases\Contracts\Bookings\CreateBookingsUseCaseInterface;
use Illuminate\Http\Request;

class BookingsCreateController extends Controller
{

    private CreateBookingsUseCaseInterface $createBookingsUseCase;

    public function __construct(CreateBookingsUseCaseInterface $createBookingsUseCase)
    {
        $this->createBookingsUseCase = $createBookingsUseCase;
    }

    public function create()
    {
        $servicesInfo = $this->createBookingsUseCase->handle();
        $services = $servicesInfo[0];
        $superArray = $servicesInfo[1];

        return view('bookings.create', compact('services', 'superArray'));
    }
}
