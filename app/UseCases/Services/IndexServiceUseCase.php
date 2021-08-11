<?php


namespace App\UseCases\Services;


use App\Models\Service;
use App\UseCases\Contracts\Services\IndexServiceUseCaseInterface;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Collection;

class IndexServiceUseCase implements IndexServiceUseCaseInterface
{
    public function handle(Request $request): array|\Illuminate\Database\Eloquent\Collection
    {
      $services  = Service::all();

      return $services;
    }
}
