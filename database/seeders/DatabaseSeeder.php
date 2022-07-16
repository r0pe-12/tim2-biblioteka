<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\BookBind;
use App\Models\Category;
use App\Models\Format;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\Script;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory()->create([
             'username' => '@'
         ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        BookBind::factory(10)->create();
        Category::factory(10)->create();
        Format::factory(10)->create();
        Genre::factory(10)->create();
        Publisher::factory(10)->create();
        Script::factory(10)->create();

        Author::factory(10)->create();
    }
}
