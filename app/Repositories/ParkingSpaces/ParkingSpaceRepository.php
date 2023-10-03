<?php

namespace App\Repositories\ParkingSpaces;

use App\Models\Parking;
use App\Models\ParkingSpace;
use App\Repositories\Contracts\ParkingSpaces\ParkingSpaceRepositoryInterface;

class ParkingSpaceRepository implements ParkingSpaceRepositoryInterface
{
    public function save(int $parkingID, string $num, ?string $type, ?int $status, ?int $enabled): ParkingSpace
    {
        $parkingSpace = new ParkingSpace();
        $parkingSpace->num = $num;

        $parkingSpace->type = 'car';

        if (! is_null($type)) {
            $parkingSpace->type = $type;
        }

        $parkingSpace->status = 0;

        if (! is_null($status)) {
            $parkingSpace->status = $status;
        }

        $parkingSpace->enabled = 1;

        if (! is_null($enabled)) {
            $parkingSpace->enabled = $enabled;
        }

        $parkingSpace->parking_id = $parkingID;
        $parkingSpace->save();

        return $parkingSpace;
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

    public function update(ParkingSpace $parkingSpace, string $num, string $type): bool
    {
        $parkingSpace->num = $num;
        $parkingSpace->type = $type;
        $parkingSpace->save();

        return true;
    }


}
