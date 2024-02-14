<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class ResidentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new User([
            'name' => strval($row[1]),
            'phone' => strval($row[4]),
            'email' => strval($row[2]),
            'role' => 'Resident',
            'password' => bcrypt(strval($row[4])),
            'is_deleted' => 0
        ]);
    }
}
