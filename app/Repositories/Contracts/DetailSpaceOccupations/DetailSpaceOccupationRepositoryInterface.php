<?php

namespace App\Repositories\Contracts\DetailSpaceOccupations;

use App\Models\DetailSpaceOccupation;

interface DetailSpaceOccupationRepositoryInterface
{
    public function save(string $visitantName, string $plate, string $apto, ?string $arrivalObservation,
                         int $parkingSpaceID): bool;
    public function update(DetailSpaceOccupation $detailSpaceOccupation, string $departureObservation): bool;
    public function getByParkingSpaceID(int $id);
    public function getLast(int $parkingSpaceID);
    public function vacateLastOccupied(DetailSpaceOccupation $detailSpaceOccupation): bool;
}
