<?php


namespace App\UseCases\Contracts\Residents;


interface ChangeStatusResidentsUseCaseInterface
{
    public function handle(Request $request):void;
}
