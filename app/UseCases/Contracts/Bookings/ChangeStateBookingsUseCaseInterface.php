<?php


namespace App\UseCases\Contracts\Bookings;


use App\Models\Booking;
use Illuminate\Http\Request;

interface ChangeStateBookingsUseCaseInterface
{
    public function handle(Request $request):Booking;
}
