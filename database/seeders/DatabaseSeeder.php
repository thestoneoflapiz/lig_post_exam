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
            "image" => "https://static01.nyt.com/images/2020/10/08/realestate/00xp-islandbroker-slide-ZYHP/00xp-islandbroker-slide-ZYHP-superJumbo.jpg",
            "title" => "My First Post!",
            "content" => "I don't actually have anything to say, but, STAY SAFE!",
        ]);

        Comment::create([
            "post_id" => 1,
            "body" => "...and GOODLUCK!~",
        ]);
    }
}
