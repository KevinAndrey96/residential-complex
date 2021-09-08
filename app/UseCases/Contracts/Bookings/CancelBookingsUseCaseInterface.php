<?php


namespace App\UseCases\Contracts\Bookings;


use Illuminate\Http\Request;

interface CancelBookingsUseCaseInterface
{
    public function handle(Request $request):array;
}
