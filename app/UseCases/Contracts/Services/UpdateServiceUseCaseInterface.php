<?php


namespace App\UseCases\Contracts\Services;


use Illuminate\Http\Request;

interface UpdateServiceUseCaseInterface
{
    public function handle(Request $request);
}
