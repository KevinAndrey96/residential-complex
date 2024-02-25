<?php

namespace App\Imports;

use App\Models\Resident;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ResidentsImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        $user = new User();
        $user->name = strval($row[1]);
        $user->phone = strval($row[4]);
        $user->email= strval($row[2]);
        $user->role = 'Resident';
        $user->password = bcrypt(strval($row[4]));
        $user->is_deleted = 0;
        $user->save();


        $resident = new Resident();

        if (strlen(strval($row[0])) <= 4) {
            $resident->tower =  substr(strval($row[0]), 0, 1);
            $resident->apt =  substr(strval($row[0]), 1, 3);

        }

        if (strlen(strval($row[0])) > 4) {
            $resident->tower =  substr(strval($row[0]), 0, 1);
            $resident->apt =  substr(strval($row[0]), 1, 4);
        }

        $resident->status = 'Habilitado';
        $resident->user_id = $user->id;
        $user->assignRole('Resident');
    }
}
