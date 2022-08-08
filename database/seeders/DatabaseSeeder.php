<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Logbook;
use App\Models\Post;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create(); //user dummy
        // Post::factory(20)->create(); //buat post dummy

        // Category::create([
        //     'name' => 'Web Programming',
        //     'slug' => 'web-porgramming'
        // ]);

        // Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);


        //mahasiswa
        User::create([
            // 'name' => 'Asep Ridwan',
            'username' => '5520119040',
            'roles' => 'mahasiswa',
            // 'email' => 'asep@gmail',
            'password' => bcrypt('12345')
        ]);

        User::create([
            // 'name' => 'Udin Saparudin',
            'username' => '5520119041',
            'roles' => 'mahasiswa',
            // 'email' => 'udin@gmail',
            'password' => bcrypt('12345')
        ]);

        //koordinator
        User::create([
            // 'name' => 'diny',
            'username' => '0325075801',
            'roles' => 'koordinator',
            // 'email' => 'diny@gmail',
            'password' => bcrypt('12345')
        ]);

        //dosen
        User::create([
            // 'name' => 'Ridwan',
            'username' => '0325075802',
            'roles' => 'dosen',
            // 'email' => 'ridwan@gmail',
            'password' => bcrypt('12345')
        ]);

        User::create([
            // 'name' => 'abdul',
            'username' => '0325075803',
            'roles' => 'dosen',
            // 'email' => 'abdul@gmail',
            'password' => bcrypt('12345')
        ]);

        Mahasiswa::create([
            'nama' => 'Asep Ridwan',
            'npm' => '5520119040',
            'kelas' => 'IF B 2019',
            'email' => 'udin@gmail.com',
            'user_id' => '1',
            'dosen_id' => '1'
        ]);

        Mahasiswa::create([
            'nama' => 'udin saparudin',
            'npm' => '5520119041',
            'kelas' => 'IF B 2019',
            'email' => 'asep@gmail.com',
            'user_id' => '2',
            'dosen_id' => '2'
        ]);

        Dosen::create([
            'nama' => 'ridwan',
            'nidn' => '0325075802',
            'email' => 'ridwan@gmail.com',
            'user_id' => '4'
        ]);

        Dosen::create([
            'nama' => 'abdul',
            'nidn' => '0325075803',
            'email' => 'abdul@gmail.com',
            'user_id' => '5'
        ]);

        Logbook::create([
            'isHadir' => true,
            'mahasiswa_id' => 1,
            'user_id' => 1,
            'date' => Carbon::now()->isoFormat('dddd, D MMMM Y'),
            'body' => 'pada pertemuan pertama saya membahas apa yang diinginkan oleh pembimbing saya'
        ]);

        Logbook::create([
            'isHadir' => true,
            'mahasiswa_id' => 1,
            'user_id' => 1,
        ]);

        Logbook::factory(10)->create(['user_id' => 1, 'mahasiswa_id' => 1]);
        Logbook::factory(10)->create(['user_id' => 2, 'mahasiswa_id' => 2]);
    }
}
