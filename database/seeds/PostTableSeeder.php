<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Post; //importo il model

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 50; $i++) {
            $newPost = new Post();  //creo l'istanza
            $newPost->title = $faker->words(5, true);
            $newPost->slug = Str::of($newPost->title)->slug('_'); //per la seo
            $newPost->content = $faker->text();
            $newPost->save();
        }
    }
}
