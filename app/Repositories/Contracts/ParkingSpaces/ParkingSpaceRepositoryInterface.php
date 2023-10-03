<?php

namespace App\Repositories\Contracts\ParkingSpaces;

use App\Models\ParkingSpace;

interface ParkingSpaceRepositoryInterface
{
    public function save(int $parkingID, string $num, ?string $type, ?int $status, ?int $enabled): ParkingSpace;
    public function getAllOrderedByNumAsc(): \Illuminate\Database\Eloquent\Collection|array;
    public function getByParkingID(int $id);
    public function changeEnabled(int $id, int $value);
    public function changeStatus(int $id, int $value);
    public function getRegisterByID(int $id);
    public function update(ParkingSpace $parkingSpace, string $num, string $type): bool;

}
