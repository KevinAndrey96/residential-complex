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
      $services  = Service::where('is_deleted', 0)->get();
      $superArray = array();
      $servicesInfo = array();

      for ($i = 0; $i < count($services); $i++){
          array_push($superArray, explode(';', $services[$i]->gallery));
      }

      array_push($servicesInfo, $services, $superArray);

      return $servicesInfo;
    }
}
