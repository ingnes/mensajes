<?php

namespace App\Imports;

use App\Models\Message;
use Maatwebsite\Excel\Concerns\ToModel;

class MessagesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Message([
           'nombre'  => trim($row[0]),
           'email'   => trim($row[1]),
           'mensaje' => trim($row[2]),
        ]);
    }
}
