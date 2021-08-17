<?php


namespace App\UseCases\Contracts\Bookings;


interface IndexBookingsUseCaseInterface
{
    public function handle():array|\Illuminate\Database\Eloquent\Collection;
}
