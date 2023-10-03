<?php

namespace App\Http\Controllers\ParkingSpaces;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Parkings\ParkingRepositoryInterface;
use App\Repositories\Contracts\ParkingSpaces\ParkingSpaceRepositoryInterface;
use Illuminate\Http\Request;

class EditParkingSpacesController extends Controller
{
    private ParkingSpaceRepositoryInterface $parkingSpaceRepository;

    public function __construct(ParkingSpaceRepositoryInterface $parkingSpaceRepository)
    {
        $this->parkingSpaceRepository = $parkingSpaceRepository;
    }

    public function __invoke($id)
    {
        return $this->parkingSpaceRepository->getRegisterByID($id);
    }
}
