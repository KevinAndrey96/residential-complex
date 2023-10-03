<?php

namespace App\Repositories\DetailSpaceOccupations;

use App\Models\DetailSpaceOccupation;
use App\Models\ParkingSpace;
use App\Repositories\Contracts\DetailSpaceOccupations\DetailSpaceOccupationRepositoryInterface;

class DetailSpaceOccupationRepository implements DetailSpaceOccupationRepositoryInterface
{
    public function save(
        string $visitantName,
        string $plate,
        string $apto,
        ?string $arrivalObservation,
        int $parkingSpaceID
    ): bool
    {
        $detailSpaceOccupation = new DetailSpaceOccupation();
        $detailSpaceOccupation->visitant_name = $visitantName;
        $detailSpaceOccupation->plate = $plate;
        $detailSpaceOccupation->apto = $apto;
        if (! is_null($arrivalObservation)) {
            $detailSpaceOccupation->arrival_observation = $arrivalObservation;
        }
        $detailSpaceOccupation->parking_space_id = $parkingSpaceID;
        $detailSpaceOccupation->save();

        return true;
    }

    public function update(DetailSpaceOccupation $detailSpaceOccupation, ?string $departureObservation): bool
    {
        if (! is_null($departureObservation)) {
            $detailSpaceOccupation->departure_observation = $departureObservation;
        }

        $detailSpaceOccupation->save();

        return true;
    }


    public function getByParkingSpaceID(int $id)
    {
        return DetailSpaceOccupation::where('parking_space_id', $id)->get();
    }

    public function getLast(int $parkingSpaceID)
    {
        return DetailSpaceOccupation::where('parking_space_id', $parkingSpaceID)
            ->orderBy('id', 'desc')
            ->first();
    }

    public function vacateLastOccupied(DetailSpaceOccupation $detailSpaceOccupation): bool
    {
        $detailSpaceOccupation->touch();

        return true;
    }


}
