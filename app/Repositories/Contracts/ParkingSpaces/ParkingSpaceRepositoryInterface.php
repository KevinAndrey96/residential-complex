<?php

namespace App\Repositories\Contracts\ParkingSpaces;

interface ParkingSpaceRepositoryInterface
{
    public function save(int $parkingID, $num): bool;
    public function getAllOrderedByNumAsc(): \Illuminate\Database\Eloquent\Collection|array;
    public function getByParkingID(int $id);
    public function changeEnabled(int $id, int $value);
    public function changeStatus(int $id, int $value);
    public function getRegisterByID(int $id);

}
