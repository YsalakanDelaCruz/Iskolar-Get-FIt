<?php

use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('posts')->insert(
         	[
            'content' => 'fsfarwr',
            'user_id' => 1,
        ]);
    }
}
