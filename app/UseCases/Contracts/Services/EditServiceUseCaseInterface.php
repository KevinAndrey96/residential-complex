<?php


namespace App\UseCases\Contracts\Services;


use App\Models\Service;
use Illuminate\Http\Request;

interface EditServiceUseCaseInterface
{
    public function handle(Request $request): Service;
}
