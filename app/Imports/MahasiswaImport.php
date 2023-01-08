<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class MahasiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mahasiswa([
            'nama' => $row[1],
            'nim' => $row[2],
            'jenis_kelamin' => $row[3],
            'status' => $row[4],
            'semester' => $row[5],
            'ipk' => $row[6]
        ]);
    }
}
