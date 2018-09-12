<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //Model::unguard();
        // $this->call('BlogTableSeeder');
        $this->call('BookTableSeeder');
    }
}

class BlogTableSeeder extends Seeder
{
  public function run()
  {
    App\Blog::truncate();

    factory(App\Blog::class, 5)->create();
  }
}

class BookTableSeeder extends Seeder
{
  public function run()
  {
        factory(App\Book::class, 5)->create();
  }
}