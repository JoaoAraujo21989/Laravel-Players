<?php

namespace App\Exports;

use App\Player;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportPlayer implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Player::all();
    }
}
