<?php

namespace App\Http\Controllers\ParkingSpaces;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ParkingSpaces\ParkingSpaceRepositoryInterface;
use Illuminate\Http\Request;

class ChangeStatusParkingSpacesController extends Controller
{
    private ParkingSpaceRepositoryInterface $parkingSpaceRepository;

    public function __construct(ParkingSpaceRepositoryInterface $parkingSpaceRepository)
    {
        $this->parkingSpaceRepository = $parkingSpaceRepository;
    }

    public function __invoke($id, $value)
    {
        $parkingSpace = $this->parkingSpaceRepository->changeStatus($id, $value);
        $parkingSpaces = $this->parkingSpaceRepository->getByParkingID($parkingSpace->parking_id);

        return datatables()->collection($parkingSpaces)->toJson();
    }
}
