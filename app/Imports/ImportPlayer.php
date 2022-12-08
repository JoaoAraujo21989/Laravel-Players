<?php

namespace App\Imports;

use App\Player;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportPlayer implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Player([
            'name' => $row[0],
            'address' => $row[1],
            'country_id' => $row[2],
            'description' => $row[3],
            'retired' => $row[4],
        ]);
    }
}
