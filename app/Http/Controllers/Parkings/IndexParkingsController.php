<?php

namespace App\Http\Controllers\Parkings;

use App\Http\Controllers\Controller;
use App\Models\Parking;
use App\Repositories\Contracts\Parkings\ParkingRepositoryInterface;
use Illuminate\Http\Request;

class IndexParkingsController extends Controller
{
    private ParkingRepositoryInterface $parkingRepository;


    public function __construct(ParkingRepositoryInterface $parkingRepository)
    {
        $this->parkingRepository = $parkingRepository;
    }


    public function __invoke()
    {
        $parkings = $this->parkingRepository->getAll();
        return view('parkings.index', ['parkings' =>  $parkings]);
    }
}
