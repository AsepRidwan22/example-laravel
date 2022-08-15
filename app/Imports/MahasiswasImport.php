<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class MahasiswasImport implements ToModel
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        return new Mahasiswa([
            'name'     => $row[0],
            'npm'    => $row[1],
            'kelas'     => $row[2],
            'email'    => $row[3],
        ]);
    }
}
