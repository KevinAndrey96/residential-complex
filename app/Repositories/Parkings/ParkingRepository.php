<?php

namespace App\Repositories\Parkings;

use App\Models\Parking;
use App\Repositories\Contracts\Parkings\ParkingRepositoryInterface;

class ParkingRepository implements ParkingRepositoryInterface
{
    public function getAll()
    {
        return Parking::all();
    }

    public function getRegisterByID(int $id)
    {
        return Parking::find($id);
    }

    public function update(Parking $parking, string $name, int $capacity, string $type): bool
    {
        $parking->name = $name;
        $parking->capacity = $capacity;
        $parking->type = $type;
        $parking->save();

        return true;
    }

    public function save(string $name, int $capacity, string $type): Parking
    {
        $parking = new Parking();
        $parking->name = $name;
        $parking->capacity = $capacity;
        $parking->type = $type;
        $parking->save();

        return $parking;
    }
}
