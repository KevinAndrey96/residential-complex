<?php

namespace App\UseCases\Contracts\Residents;

use Illuminate\Http\Request;

/**
 * Interface UpdateResidentsUseCaseInterface
 * @package App\UseCases\Contracts\Residents
 */
interface UpdateResidentsUseCaseInterface
{
    public function isOccupied(Request $request): bool;
}
