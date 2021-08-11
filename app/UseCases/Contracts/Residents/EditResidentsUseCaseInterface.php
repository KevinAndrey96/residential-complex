<?php


namespace App\UseCases\Contracts\Residents;


use App\Models\User;
use Illuminate\Http\Request;

interface EditResidentsUseCaseInterface
{
    public function handle(Request $request):User;
}
