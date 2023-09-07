<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Payments\PaymentRepositoryInterface;
use App\Repositories\Contracts\Residents\ResidentRepositoryInterface;
use Illuminate\Http\Request;

class CreatePaymentsController extends Controller
{
    private ResidentRepositoryInterface $residentRepository;

    public function __construct(PaymentRepositoryInterface $paymentRepository, ResidentRepositoryInterface $residentRepository)
    {
        $this->residentRepository = $residentRepository;
    }

    public function __invoke()
    {
        $residents =  $this->residentRepository->getAllResidents();

        return view('payments.create', ['residents' => $residents]);
    }
}
