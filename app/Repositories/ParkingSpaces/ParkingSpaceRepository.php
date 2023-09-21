<?php

namespace App\Repositories\ParkingSpaces;

use App\Models\ParkingSpace;
use App\Repositories\Contracts\ParkingSpaces\ParkingSpaceRepositoryInterface;

class ParkingSpaceRepository implements ParkingSpaceRepositoryInterface
{
    public function save(int $parkingID, $num): bool
    {
        $parkingSpace = new ParkingSpace();
        $parkingSpace->num = intval($num);
        $parkingSpace->status = 0;
        $parkingSpace->enabled = 1;
        $parkingSpace->parking_id = $parkingID;
        $parkingSpace->save();

        return true;
    }

    public function getAllOrderedByNumAsc(): \Illuminate\Database\Eloquent\Collection|array
    {
        return ParkingSpace::orderBy('created_at', 'asc')->get();
    }

    public function getByParkingID(int $id)
    {
        return ParkingSpace::where('parking_id', $id)->get();
    }

    public function changeEnabled(int $id, int $value)
    {
        $parkingSpace = ParkingSpace::find($id);
        $parkingSpace->enabled = $value;
        $parkingSpace->save();

        return $parkingSpace;
    }

    public function changeStatus(int $id, int $value)
    {
        $parkingSpace = ParkingSpace::find($id);
        $parkingSpace->status = $value;
        $parkingSpace->save();

        return $parkingSpace;
    }

    public function getRegisterByID(int $id)
    {
        return ParkingSpace::find($id);
    }


}
