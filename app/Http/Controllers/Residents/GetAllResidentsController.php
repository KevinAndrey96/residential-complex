<?php

namespace App\Http\Controllers\Residents;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResidentResource;
use App\Models\Resident;
use App\Repositories\Contracts\Residents\ResidentRepositoryInterface;
use Illuminate\Http\Request;

class GetAllResidentsController extends Controller
{
    private ResidentRepositoryInterface $residentRepository;

    public function __construct(ResidentRepositoryInterface $residentRepository)
    {
        $this->residentRepository = $residentRepository;
    }

    public function  __invoke()
    {
        $residents = $this->residentRepository->getAllOfResidentsTable();

        return ResidentResource::collection($residents);
    }
}
