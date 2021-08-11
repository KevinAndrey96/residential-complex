<?php


namespace App\UseCases\Contracts\Services;


use Illuminate\Http\Request;


interface DeleteServiceUseCaseInterface
{
    public function handle(Request $request):Bool;
}
