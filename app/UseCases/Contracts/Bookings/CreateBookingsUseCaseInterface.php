<?php


namespace App\UseCases\Contracts\Bookings;


use Illuminate\Http\Request;

interface CreateBookingsUseCaseInterface
{
    public function handle(): array|\Illuminate\Database\Eloquent\Collection;

}
