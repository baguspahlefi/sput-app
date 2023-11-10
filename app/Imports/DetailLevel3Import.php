<?php

namespace App\Imports;

use App\Models\DetailLevel3;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DetailLevel3Import implements ToModel,WithStartRow
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
        return new DetailLevel3([
            'id_meeting'  => $row[1],
            'point_of_meeting'  => $row[2],
            'pic'  => $row[3],
            'due'  => $row[4],
            'status'  => $row[5]
        ]);
    }
}
