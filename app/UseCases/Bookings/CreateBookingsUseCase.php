<?php


namespace App\UseCases\Bookings;


use App\Models\Service;
use App\UseCases\Contracts\Bookings\CreateBookingsUseCaseInterface;



class CreateBookingsUseCase implements CreateBookingsUseCaseInterface
{
    public function handle(): array|\Illuminate\Database\Eloquent\Collection
    {
        $services = Service::where('is_deleted', 0)->get();
        return $services;
    }
}
