<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Payments\PaymentRepositoryInterface;
use App\Repositories\Contracts\Residents\ResidentRepositoryInterface;
use Illuminate\Http\Request;

class MyPaymentsController extends Controller
{
    private PaymentRepositoryInterface $paymentRepository;
    private ResidentRepositoryInterface $residentRepository;


    public function __construct(PaymentRepositoryInterface $paymentRepository, ResidentRepositoryInterface $residentRepository)
    {
        $this->paymentRepository = $paymentRepository;
        $this->residentRepository = $residentRepository;
    }

    public function __invoke()
    {
        $years = $this->paymentRepository->getYears();
        $residents =  $this->residentRepository->getAllResidents();

        return view('payments.myPayments', ['years' => $years, 'residents' => $residents]);
    }
}
