<?php

use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Article::class, 3)->create()->each(function ($article) {
            $article->photos()->save(factory(App\Photo::class)->make());
        });
    }
}
