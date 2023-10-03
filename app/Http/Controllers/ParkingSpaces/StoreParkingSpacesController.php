<?php

namespace App\Http\Controllers\ParkingSpaces;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Parkings\ParkingRepositoryInterface;
use App\Repositories\Contracts\ParkingSpaces\ParkingSpaceRepositoryInterface;
use Illuminate\Http\Request;

class StoreParkingSpacesController extends Controller
{
    private ParkingSpaceRepositoryInterface $parkingSpaceRepository;
    private ParkingRepositoryInterface $parkingRepository;

    public function __construct(ParkingSpaceRepositoryInterface $parkingSpaceRepository, ParkingRepositoryInterface $parkingRepository)
    {
        $this->parkingSpaceRepository = $parkingSpaceRepository;
        $this->parkingRepository = $parkingRepository;
    }


    public function __invoke(Request $request)
    {
        $num = $request->input('num');
        $type = $request->input('type');
        $status = $request->input('status');
        $enabled = $request->input('enabled');
        $parkingID = $request->input('id');
        $parkingSpace = $this->parkingSpaceRepository->save($parkingID, $num, $type, $status, $enabled);
        $parking = $this->parkingRepository->getRegisterByID($parkingSpace->parking_id);
        $this->parkingRepository->increaseCapacity($parking);
        $parkingSpaces = $this->parkingSpaceRepository->getByParkingID($parking->id);

        return datatables()->collection($parkingSpaces)->toJson();
    }
}
