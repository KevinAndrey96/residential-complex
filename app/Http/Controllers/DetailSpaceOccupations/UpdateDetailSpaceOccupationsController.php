<?php

namespace App\Http\Controllers\DetailSpaceOccupations;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\DetailSpaceOccupations\DetailSpaceOccupationRepositoryInterface;
use App\Repositories\Contracts\ParkingSpaces\ParkingSpaceRepositoryInterface;
use Illuminate\Http\Request;

class UpdateDetailSpaceOccupationsController extends Controller
{
    private ParkingSpaceRepositoryInterface $parkingSpaceRepository;
    private DetailSpaceOccupationRepositoryInterface $detailSpaceOccupationRepository;

    public function __construct(ParkingSpaceRepositoryInterface $parkingSpaceRepository,
                                DetailSpaceOccupationRepositoryInterface $detailSpaceOccupationRepository)
    {

        $this->parkingSpaceRepository = $parkingSpaceRepository;
        $this->detailSpaceOccupationRepository = $detailSpaceOccupationRepository;
    }

    public function __invoke(Request $request)
    {
        $parkingSpaceID = $request->input('parking_space_id');
        $lastDetail = $this->detailSpaceOccupationRepository->getLast($parkingSpaceID);
        $this->detailSpaceOccupationRepository->vacateLastOccupied($lastDetail);
        $parkingSpace = $this->parkingSpaceRepository->changeStatus($parkingSpaceID, 0);
        $parkingSpaces = $this->parkingSpaceRepository->getByParkingID($parkingSpace->parking_id);



        return datatables()->collection($parkingSpaces)->toJson();
    }
}
