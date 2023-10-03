<?php

namespace App\Http\Controllers\DetailSpaceOccupations;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\DetailSpaceOccupations\DetailSpaceOccupationRepositoryInterface;
use App\Repositories\Contracts\ParkingSpaces\ParkingSpaceRepositoryInterface;
use Illuminate\Http\Request;

class HistoryDetailSpaceOccupationsController extends Controller
{
    private ParkingSpaceRepositoryInterface $parkingSpaceRepository;
    private DetailSpaceOccupationRepositoryInterface $detailSpaceOccupationRepository;


    public function __construct(ParkingSpaceRepositoryInterface $parkingSpaceRepository,
                                DetailSpaceOccupationRepositoryInterface $detailSpaceOccupationRepository)
    {
        $this->parkingSpaceRepository = $parkingSpaceRepository;
        $this->detailSpaceOccupationRepository = $detailSpaceOccupationRepository;
    }

    public function __invoke(int $id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $parkingSpace = $this->parkingSpaceRepository->getRegisterByID($id);
        $parkingID = $parkingSpace->parking_id;
        $detailSpaceOccupations = $this->detailSpaceOccupationRepository->getByParkingSpaceID($id);

        return view('detailSpaceOccupations.history', ['parkingID' => $parkingID,
            'detailSpaceOccupations' => $detailSpaceOccupations]);
    }
}
