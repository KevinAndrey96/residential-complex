<?php

namespace App\UseCases\Contracts\Residents;

use Illuminate\Http\Request;

/**
 * Interface StoreResidentsUseCaseInterface
 * @package App\UseCases\Contracts\Residents
 */
interface StoreResidentsUseCaseInterface
{
    public function handle(Request $request):void;
}
