<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Services\StoreServiceUseCaseInterface;
use Illuminate\Http\Request;

class ServicesStoreController extends Controller
{

    private StoreServiceUseCaseInterface $storeServiceUseCase;

    public function __construct(StoreServiceUseCaseInterface $storeServiceUseCase)
    {
        $this->storeServiceUseCase  = $storeServiceUseCase;
    }


    public function store(Request $request)
    {
        $this->storeServiceUseCase->handle($request);
        return redirect('/services');
    }
}
