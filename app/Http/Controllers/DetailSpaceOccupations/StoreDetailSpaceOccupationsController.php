<?php

namespace App\Http\Controllers\DetailSpaceOccupations;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\DetailSpaceOccupations\DetailSpaceOccupationRepositoryInterface;
use App\Repositories\Contracts\ParkingSpaces\ParkingSpaceRepositoryInterface;
use Illuminate\Http\Request;

class StoreDetailSpaceOccupationsController extends Controller
{
    private DetailSpaceOccupationRepositoryInterface $detailSpaceOccupationRepository;
    private ParkingSpaceRepositoryInterface $parkingSpaceRepository;

    public function __construct(DetailSpaceOccupationRepositoryInterface $detailSpaceOccupationRepository,
                                ParkingSpaceRepositoryInterface $parkingSpaceRepository)
    {
        $this->detailSpaceOccupationRepository = $detailSpaceOccupationRepository;
        $this->parkingSpaceRepository = $parkingSpaceRepository;
    }


    public function __invoke(Request $request)
    {
        $visitantName = $request->input('visitant_name');
        $plate = $request->input('plate');
        $apto = $request->input('apto');
        $arrivalObservation = $request->input('arrival_observation');
        $parkingSpaceID = $request->input('parking_space_id');

        $this->detailSpaceOccupationRepository->save(
            $visitantName,
            $plate,
            $apto,
            $arrivalObservation,
            $parkingSpaceID);

        $this->parkingSpaceRepository->changeStatus($parkingSpaceID, 1);
        $parkingSpace = $this->parkingSpaceRepository->getRegisterByID($parkingSpaceID);
        $parkingSpaces = $this->parkingSpaceRepository->getByParkingID($parkingSpace->parking_id);



        return datatables()->collection($parkingSpaces)->toJson();



    }
}
