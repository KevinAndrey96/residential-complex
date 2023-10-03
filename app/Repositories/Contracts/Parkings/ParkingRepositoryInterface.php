<?php

namespace App\Repositories\Contracts\Parkings;

use App\Models\Parking;

interface ParkingRepositoryInterface
{
    public function getAll();
    public function getRegisterByID(int $id);
    public function update(Parking $parking, string $name, ?int $capacity, string $type): bool;
    public function save(string $name, int $capacity, string $type): Parking;
    public function increaseCapacity(Parking $parking): bool;
}
