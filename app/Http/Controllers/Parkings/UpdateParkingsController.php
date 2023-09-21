<?php

namespace App\Http\Controllers\Parkings;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Parkings\ParkingRepositoryInterface;
use Illuminate\Http\Request;

class UpdateParkingsController extends Controller
{
    private ParkingRepositoryInterface $parkingRepository;

    public function __construct(ParkingRepositoryInterface $parkingRepository)
    {
        $this->parkingRepository = $parkingRepository;
    }

    public function __invoke(Request $request)
    {
        $name = $request->input('name');
        $capacity = $request->input('capacity');
        $type = $request->input('type');
        $id = intval($request->input('id'));
        $parking = $this->parkingRepository->getRegisterByID($id);
        $this->parkingRepository->update($parking, $name, $capacity, $type);
        $parkings = $this->parkingRepository->getAll();

        return datatables()->collection($parkings)->toJson();
    }
}
