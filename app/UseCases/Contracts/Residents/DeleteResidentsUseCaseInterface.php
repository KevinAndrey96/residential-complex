<?php


namespace App\UseCases\Contracts\Residents;


use Illuminate\Http\Request;

interface DeleteResidentsUseCaseInterface
{
    public function handle(Request $request):void;
}
