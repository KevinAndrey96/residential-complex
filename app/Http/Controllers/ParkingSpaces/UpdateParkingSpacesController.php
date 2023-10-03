<?php

namespace App\Http\Controllers\ParkingSpaces;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ParkingSpaces\ParkingSpaceRepositoryInterface;
use Illuminate\Http\Request;

class UpdateParkingSpacesController extends Controller
{
    private ParkingSpaceRepositoryInterface $parkingSpaceRepository;

    public function __construct(ParkingSpaceRepositoryInterface $parkingSpaceRepository)
    {
        $this->parkingSpaceRepository = $parkingSpaceRepository;
    }

    public function __invoke(Request $request)
    {
        $num = $request->input('num');
        $type = $request->input('type');
        $id = $request->input('id');

        $parkingSpace = $this->parkingSpaceRepository->getRegisterByID($id);
        $this->parkingSpaceRepository->update($parkingSpace, $num, $type);

        $parkingSpaces = $this->parkingSpaceRepository->getByParkingID($parkingSpace->parking_id);

        return datatables()->collection($parkingSpaces)->toJson();





    }
}
