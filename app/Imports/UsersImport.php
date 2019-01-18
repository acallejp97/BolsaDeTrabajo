<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        return new User([
           'id'     => $row[0],
           'nombre'    => $row[1], 
           'rango'    => $row[2], 
           'apellidos'    => $row[3], 
           'imagen'    => $row[4], 
           'created_at'    => $row[5], 
        ]);
    }
}
