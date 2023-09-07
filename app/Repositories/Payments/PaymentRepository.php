<?php

namespace App\Repositories\Payments;

use App\Models\Payment;
use App\Repositories\Contracts\Payments\PaymentRepositoryInterface;
use Carbon\Carbon;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function getAllPayments(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Payment::all();
    }

    public function getPaymentsByYearsMonthsAndUsers(array $years, array $months, array $users)
    {

    }

    public function getYears()
    {
        $years = array_unique($this->getAllPayments()->pluck('year')->toArray());

        return $years;
    }

    public function savePayment(string $date, string $userID):bool
    {
        $date = Carbon::parse($date);
        $month = $date->month;
        $year = $date->year;


        $oldPayment = Payment::where([
            ['year', $year],
            ['month', $month],
            ['user_id', intval($userID)]
        ])->first();

        if (isset($oldPayment)) {
            return false;
        }

        $payment = new Payment();
        $payment->user_id = intval($userID);
        $payment->year = $year;
        $payment->month = $month;
        $payment->save();

        return true;
    }
}
