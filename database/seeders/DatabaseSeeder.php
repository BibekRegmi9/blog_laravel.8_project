<?php

namespace Database\Seeders;

use Database\Factories\PostFactory;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
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

        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create([
            'name'=> 'John Carter',

        ]);

        Post::factory(20)->create([
            'user_id' => $user -> id

        ]);


//
//         $user = User::factory()->create();
//
//         $personal = Category::create([
//             'name' => 'Personal',
//             'slug' => 'Personal'
//         ]);
//        $family = Category::create([
//            'name' => 'Family',
//            'slug' => 'Family'
//        ]);
//        $work = Category::create([
//            'name' => 'Work',
//            'slug' => 'Work'
//        ]);
//
//        Post::create([
//            'category_id' => $family->id,
//            'user_id' => $user->id,
//            'title' => 'my-family-post',
//            'slug' => 'my-first-post',
//            'excerpt' => 'loorei jkldh aliu pore ijufmn lfkj ',
//            'body' => 'lore rn akj for solemnising odi dok d if the master  am ir edquot'
//        ]);
//
//        Post::create([
//            'category_id' => $work->id,
//            'user_id' => $work->id,
//            'title' => 'my work-post',
//            'slug' => 'my-work-post',
//            'excerpt' => 'loorei jkldh aliu pore ijufmn lfkj ',
//            'body' => 'lore rn akj for solemnising odi dok d if the master  am ir edquot'
//        ]);
    }
}
