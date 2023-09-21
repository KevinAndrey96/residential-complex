<?php

namespace App\Http\Controllers\Parkings;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Parkings\ParkingRepositoryInterface;
use Illuminate\Http\Request;
use Monolog\Handler\ZendMonitorHandler;

class EditParkingsController extends Controller
{
    private ParkingRepositoryInterface $parkingRepository;

    public function __construct(ParkingRepositoryInterface $parkingRepository)
    {
        $this->parkingRepository =  $parkingRepository;
    }

    public function __invoke($id)
    {
        $id = intval($id);
        return $this->parkingRepository->getRegisterByID($id);
    }
}
