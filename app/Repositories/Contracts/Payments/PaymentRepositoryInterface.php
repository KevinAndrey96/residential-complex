<?php

namespace App\Repositories\Contracts\Payments;

interface PaymentRepositoryInterface
{
    public function getAllPayments();
    public function getYears();
    public function savePayment(string $date, string $userID):bool;
}
