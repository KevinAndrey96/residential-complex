<?php


namespace App\UseCases\Services;

use App\Models\Service;
use App\Models\User;
use App\UseCases\Contracts\Services\UpdateServiceUseCaseInterface;
use Illuminate\Http\Request;

class UpdateServiceUseCase implements UpdateServiceUseCaseInterface
{
    public function handle(Request $request)
    {
        $dataService = Request()->except('_token', 'user_id');

        if (isset($dataService['state'])) {
            if ($dataService['state'] == 'enable' ) {
                $dataService['state'] = 1;
            } else {
                $dataService['state'] = 0;
            }
        }

        if (isset($dataService['monday'])) {
            if ($dataService['monday'] == 'true' ) {
                $dataService['monday'] = 1;
            } else {
                $dataService['monday'] = 0;
            }
        } else {
            $dataService['monday'] = 0;
        }
        if (isset($dataService['tuesday'])) {
            if ($dataService['tuesday'] == 'true' ) {
                $dataService['tuesday'] = 1;
            } else {
                $dataService['tuesday'] = 0;
            }
        } else {
            $dataService['tuesday'] = 0;
        }
        if (isset($dataService['wednesday'])) {
            if ($dataService['wednesday'] == 'true' ) {
                $dataService['wednesday'] = 1;
            } else {
                $dataService['wednesday'] = 0;
            }
        } else {
            $dataService['wednesday'] = 0;
        }
        if (isset($dataService['thursday'])) {
            if ($dataService['thursday'] == 'true' ) {
                $dataService['thursday'] = 1;
            } else {
                $dataService['thursday'] = 0;
            }
        } else {
            $dataService['thursday'] = 0;
        }
        if (isset($dataService['friday'])) {
            if ($dataService['friday'] == 'true' ) {
                $dataService['friday'] = 1;
            } else {
                $dataService['friday'] = 0;
            }
        } else {
            $dataService['friday'] = 0;
        }
        if (isset($dataService['saturday'])) {
            if ($dataService['saturday'] == 'true' ) {
                $dataService['saturday'] = 1;
            } else {
                $dataService['saturday'] = 0;
            }
        } else {
            $dataService['saturday'] = 0;
        }
        if (isset($dataService['sunday'])) {
            if ($dataService['sunday'] == 'true' ) {
                $dataService['sunday'] = 1;
            } else {
                $dataService['sunday'] = 0;
            }
        } else {
            $dataService['sunday'] = 0;
        }
        Service::find($request->input('service_id'))->update($dataService);
    }
}
