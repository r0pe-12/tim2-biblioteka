<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookBind;
use App\Models\Category;
use App\Models\Format;
use App\Models\Genre;
use App\Models\Language;
use App\Models\Publisher;
use App\Models\Role;
use App\Models\Script;
use App\Models\User;
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
         User::factory()->create([
             'username' => 'bibliotekar',
             'role_id' => Role::librarian()->id,
         ]);

         User::factory()->create([
             'username' => 'glavna-glava',
             'role_id' => Role::admin()->id,
         ]);

         User::factory(10)->create([
             'role_id' => Role::student()->id,
         ]);

         $book = Book::factory(3)
             ->has(Category::factory()->count(3))
             ->has(Genre::factory()->count(3))
             ->has(Author::factory()->count(3))
            ->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

//        BookBind::factory(10)->create();
//        Category::factory(10)->create();
//        Format::factory(10)->create();
//        Genre::factory(10)->create();
//        Publisher::factory(10)->create();
//        Script::factory(10)->create();
//        Language::factory(10)->create();

//        Author::factory(10)->create();
    }
}
