<?php

namespace App\Repositories\Contracts\Residents;

interface ResidentRepositoryInterface
{
    public function getAllResidents();
    public function getAllOfResidentsTable(): \Illuminate\Database\Eloquent\Collection|array;
}
