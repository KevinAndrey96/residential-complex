<?php


namespace App\UseCases\Contracts\Services;


use Illuminate\Http\Request;

interface IndexServiceUseCaseInterface
{
public function handle(Request $request): array|\Illuminate\Database\Eloquent\Collection;
}
