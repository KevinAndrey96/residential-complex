<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Payments\PaymentRepositoryInterface;
use App\Repositories\Contracts\Residents\ResidentRepositoryInterface;
use Illuminate\Http\Request;

class StorePaymentsController extends Controller
{
    private PaymentRepositoryInterface $paymentRepository;

    public function __construct(PaymentRepositoryInterface $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function __invoke(Request $request)
    {
        $date = $request->input('date');
        $userID = $request->input('userID');

        $isRegistered = $this->paymentRepository->savePayment($date, $userID);

        if ($isRegistered) {
            return redirect()->route('payments.index')->with('successfulPayment', 'Pago satisfactorio');
        }

        return redirect()->route('payments.index')
            ->with('thereIsAlreadyAPayment', 'Ya tiene un pago hecho para ese mes');
    }
}
