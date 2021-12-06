<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title'=>'初めての投稿',
            'body'=>'Mr.Cosme',
            'user_id'=>2,
        ]);
    }
}
