<?php


namespace App\UseCases\Contracts\Bookings;


use Illuminate\Http\Request;

interface StoreBookingsUseCaseInterface
{
    public function handle(Request $request):bool;
}
