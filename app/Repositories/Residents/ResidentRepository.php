<?php

namespace App\Repositories\Residents;

use App\Models\Resident;
use App\Models\User;
use App\Repositories\Contracts\Residents\ResidentRepositoryInterface;

class ResidentRepository implements ResidentRepositoryInterface
{
    public function getAllResidents()
    {
        return User::where([['role', 'Resident'],
            ['is_deleted',0]])->get();
    }

    public function getAllOfResidentsTable(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Resident::all();
    }



}
