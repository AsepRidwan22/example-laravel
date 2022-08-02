<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Mahasiswa;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Asep Ridwan',
            'username' => '5520119040',
            'roles' => 'koordinator',
            'email' => 'asep@gmail',
            'password' => bcrypt('12345')
        ]);

        // User::create([
        //     'name' => 'Ridwan Malik',
        //     'email' => 'ridwan@gmail',
        //     'password' => bcrypt('12345')
        // ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-porgramming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci quis soluta officia reprehenderit ipsum deserunt maxime eum aspernatur incidunt qui commodi voluptatibus beatae repellat, alias dignissimos asperiores ab minus illo iusto. Natus beatae magni hic, ratione aut necessitatibus quia distinctio, delectus numquam magnam consequatur ab commodi veritatis molestias quis nemo laudantium vitae sit, rerum quas reprehenderit. ',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci quis soluta officia reprehenderit ipsum deserunt maxime eum aspernatur incidunt qui commodi voluptatibus beatae repellat, alias dignissimos asperiores ab minus illo iusto. Natus beatae magni hic, ratione aut necessitatibus quia distinctio, delectus numquam magnam consequatur ab commodi veritatis molestias quis nemo laudantium vitae sit, rerum quas reprehenderit. Corrupti, incidunt cupiditate possimus inventore dolor voluptas deserunt unde a itaque odio veniam quas odit, corporis tempora voluptates ullam, suscipit iure. Placeat numquam aspernatur delectus at culpa ipsam? Sapiente quis dolor nesciunt vero, pariatur dolores aspernatur asperiores, doloribus autem iste corporis reprehenderit, minima commodi.',
        // ]);

        // Post::create([
        //     'title' => 'judul Kedua',
        //     'slug' => 'judul-Kedua',
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci quis soluta officia reprehenderit ipsum deserunt maxime eum aspernatur incidunt qui commodi voluptatibus beatae repellat, alias dignissimos asperiores ab minus illo iusto. Natus beatae magni hic, ratione aut necessitatibus quia distinctio, delectus numquam magnam consequatur ab commodi veritatis molestias quis nemo laudantium vitae sit, rerum quas reprehenderit. ',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci quis soluta officia reprehenderit ipsum deserunt maxime eum aspernatur incidunt qui commodi voluptatibus beatae repellat, alias dignissimos asperiores ab minus illo iusto. Natus beatae magni hic, ratione aut necessitatibus quia distinctio, delectus numquam magnam consequatur ab commodi veritatis molestias quis nemo laudantium vitae sit, rerum quas reprehenderit. Corrupti, incidunt cupiditate possimus inventore dolor voluptas deserunt unde a itaque odio veniam quas odit, corporis tempora voluptates ullam, suscipit iure. Placeat numquam aspernatur delectus at culpa ipsam? Sapiente quis dolor nesciunt vero, pariatur dolores aspernatur asperiores, doloribus autem iste corporis reprehenderit, minima commodi.',
        // ]);

        // Post::create([
        //     'title' => 'judul Ketiga',
        //     'slug' => 'judul-Ketiga',
        //     'category_id' => 2,
        //     'user_id' => 1,
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci quis soluta officia reprehenderit ipsum deserunt maxime eum aspernatur incidunt qui commodi voluptatibus beatae repellat, alias dignissimos asperiores ab minus illo iusto. Natus beatae magni hic, ratione aut necessitatibus quia distinctio, delectus numquam magnam consequatur ab commodi veritatis molestias quis nemo laudantium vitae sit, rerum quas reprehenderit. ',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci quis soluta officia reprehenderit ipsum deserunt maxime eum aspernatur incidunt qui commodi voluptatibus beatae repellat, alias dignissimos asperiores ab minus illo iusto. Natus beatae magni hic, ratione aut necessitatibus quia distinctio, delectus numquam magnam consequatur ab commodi veritatis molestias quis nemo laudantium vitae sit, rerum quas reprehenderit. Corrupti, incidunt cupiditate possimus inventore dolor voluptas deserunt unde a itaque odio veniam quas odit, corporis tempora voluptates ullam, suscipit iure. Placeat numquam aspernatur delectus at culpa ipsam? Sapiente quis dolor nesciunt vero, pariatur dolores aspernatur asperiores, doloribus autem iste corporis reprehenderit, minima commodi.',
        // ]);

        // Post::create([
        //     'title' => 'judul ke empat',
        //     'slug' => 'judul-ke-empat',
        //     'category_id' => 2,
        //     'user_id' => 1,
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci quis soluta officia reprehenderit ipsum deserunt maxime eum aspernatur incidunt qui commodi voluptatibus beatae repellat, alias dignissimos asperiores ab minus illo iusto. Natus beatae magni hic, ratione aut necessitatibus quia distinctio, delectus numquam magnam consequatur ab commodi veritatis molestias quis nemo laudantium vitae sit, rerum quas reprehenderit. ',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci quis soluta officia reprehenderit ipsum deserunt maxime eum aspernatur incidunt qui commodi voluptatibus beatae repellat, alias dignissimos asperiores ab minus illo iusto. Natus beatae magni hic, ratione aut necessitatibus quia distinctio, delectus numquam magnam consequatur ab commodi veritatis molestias quis nemo laudantium vitae sit, rerum quas reprehenderit. Corrupti, incidunt cupiditate possimus inventore dolor voluptas deserunt unde a itaque odio veniam quas odit, corporis tempora voluptates ullam, suscipit iure. Placeat numquam aspernatur delectus at culpa ipsam? Sapiente quis dolor nesciunt vero, pariatur dolores aspernatur asperiores, doloribus autem iste corporis reprehenderit, minima commodi.',
        // ]);

        // Post::create([
        //     'title' => 'judul ke lima',
        //     'slug' => 'judul-ke-lima',
        //     'category_id' => 2,
        //     'user_id' => 2,
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci quis soluta officia reprehenderit ipsum deserunt maxime eum aspernatur incidunt qui commodi voluptatibus beatae repellat, alias dignissimos asperiores ab minus illo iusto. Natus beatae magni hic, ratione aut necessitatibus quia distinctio, delectus numquam magnam consequatur ab commodi veritatis molestias quis nemo laudantium vitae sit, rerum quas reprehenderit. ',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci quis soluta officia reprehenderit ipsum deserunt maxime eum aspernatur incidunt qui commodi voluptatibus beatae repellat, alias dignissimos asperiores ab minus illo iusto. Natus beatae magni hic, ratione aut necessitatibus quia distinctio, delectus numquam magnam consequatur ab commodi veritatis molestias quis nemo laudantium vitae sit, rerum quas reprehenderit. Corrupti, incidunt cupiditate possimus inventore dolor voluptas deserunt unde a itaque odio veniam quas odit, corporis tempora voluptates ullam, suscipit iure. Placeat numquam aspernatur delectus at culpa ipsam? Sapiente quis dolor nesciunt vero, pariatur dolores aspernatur asperiores, doloribus autem iste corporis reprehenderit, minima commodi.',
        // ]);

        Mahasiswa::create([
            'nama' => 'udin saparudin',
            'npm' => '5520119076',
            'kelas' => 'IF B 2019',
            'email' => 'udinsprudidn@gmail.com',
            'user_id' => '1',
        ]);
    }
}
