<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Dosen;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DosenImport implements WithHeadingRow, ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        User::create([
            'username' => $row['nidn'],
            'roles' => 'dosen',
            'password' => bcrypt('12345')
        ]);

        $user = User::where('username', $row['nidn'])->value('id');
        Dosen::create([
            'nama' => $row['nama'],
            'nidn' => $row['nidn'],
            'email' => $row['email'],
            'noHp' => $row['telepon'],
            'linkGroup' => $row['wa'],
            'user_id' => $user
        ]);
    }
}
