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
       factory(App\User::class,10)->create();
       factory(App\Post::class,50)->create();
       factory(App\Like::class,100)->create();
    }
}
