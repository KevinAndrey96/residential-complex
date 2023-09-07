<?php

namespace App\Repositories\Residents;

use App\Models\User;
use App\Repositories\Contracts\Residents\ResidentRepositoryInterface;

class ResidentRepository implements ResidentRepositoryInterface
{
    public function getAllResidents()
    {
        return User::where([['role', 'Resident'],
            ['is_deleted',0]])->get();
    }



}
