<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Article;
use \App\Models\Person;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Article::factory(10)->create();
        Person::factory(20)->create();
    }
}
