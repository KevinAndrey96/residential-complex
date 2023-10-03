<?php

namespace App\Http\Controllers\Parkings;

use App\Http\Controllers\Controller;
use App\Models\Parking;
use App\Models\ParkingSpace;
use App\Repositories\Contracts\Parkings\ParkingRepositoryInterface;
use App\Repositories\Contracts\ParkingSpaces\ParkingSpaceRepositoryInterface;
use Illuminate\Http\Request;

class StoreParkingsController extends Controller
{
    private ParkingRepositoryInterface $parkingRepository;
    private ParkingSpaceRepositoryInterface $parkingSpaceRepository;

    public function __construct(ParkingRepositoryInterface $parkingRepository, ParkingSpaceRepositoryInterface $parkingSpaceRepository)
    {
        $this->parkingRepository = $parkingRepository;
        $this->parkingSpaceRepository = $parkingSpaceRepository;
    }

    public function __invoke(Request $request)
    {
        $name = $request->input('name');
        $capacity = intval($request->input('capacity'));
        $type = $request->input('type');
        $parking = $this->parkingRepository->save($name, $capacity, $type);
        $parkingID = intval($parking->id);
        $parkings = $this->parkingRepository->getAll();

        for ($i = 1; $i <= $capacity; $i++) {
            $this->parkingSpaceRepository->save($parkingID, $i, null, null, null);
        }

        return datatables()->collection($parkings)->toJson();
    }
}
