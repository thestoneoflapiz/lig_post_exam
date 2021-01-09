<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\{
    User, Post, Comment
};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            "name" => "superadmin",
            "email" => "superadmin@lig.com",
            "password" => bcrypt("123superadmin$"),
            'api_token' => Str::random(60),
        ]);

        Post::create([
            "title" => "My First Post!",
            "content" => "I don't actually have anything to say, but, STAY SAFE!",
            "user_id" => 1,
        ]);

        Comment::create([
            "post_id" => 1,
            "body" => "...and GOODLUCK!~",
            "user_id" => 1,
        ]);
    }
}
