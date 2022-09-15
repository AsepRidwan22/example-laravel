<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Logbook;
use App\Models\Progres;
use App\Models\Mahasiswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswasImport implements WithHeadingRow, ToModel
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        User::create([
            'username' => $row['npm'],
            'roles' => 'mahasiswa',
            'password' => bcrypt('12345')
        ]);

        $user = User::where('username', $row['npm'])->value('id');
        Mahasiswa::create([
            'nama' => $row['name'],
            'npm' => $row['npm'],
            'kelas' => $row['kelas'],
            'email' => $row['email'],
            'noHp' => $row['telepon'],
            'user_id' => $user
        ]);

        $user = User::where('username', $row['npm'])->value('id');
        $mahasiswa = Mahasiswa::where('npm', $row['npm'])->value('id');

        Logbook::factory(12)->create(['user_id' => $user, 'mahasiswa_id' => $mahasiswa]);
        Progres::factory(4)->create(['user_id' => $user, 'mahasiswa_id' => $mahasiswa]);
    }
}
