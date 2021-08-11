<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Services\IndexServiceUseCaseInterface;
use Illuminate\Http\Request;

class ServicesIndexController extends Controller
{
    private IndexServiceUseCaseInterface $indexServiceUseCase;

    public function __construct(IndexServiceUseCaseInterface $indexServiceUseCase)
    {
        $this->indexServiceUseCase = $indexServiceUseCase;
    }

    public function index(Request $request)
    {
        $services = $this->indexServiceUseCase->handle($request);
        return view('services.index', compact('services'));
    }
}
