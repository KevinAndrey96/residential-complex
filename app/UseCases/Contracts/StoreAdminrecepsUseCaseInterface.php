<?php

namespace App\UseCases\Contracts;

use Illuminate\Http\Request;

/**
 * Interface StoreAdminrecepsUseCaseInterface
 * @package App\UseCases\Contracts
 */
interface StoreAdminrecepsUseCaseInterface
{
    /**
     * Este caso de uso guarda un adminrecep
     * @param Request $request
     * @return void
     */
    public function handle(Request $request): void;
}
