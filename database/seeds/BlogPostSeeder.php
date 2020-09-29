<?php

use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = [];
        for ($i=0; $i < 15; $i++) {
            array_push($content, [
                'title' => "Post de ejemplo $i",
                'slug' => "post-de-ejemplo-$i",
                'content' => "Hola soy el $i post de ejemplo",
                'content_md' => "Hola soy el $i post de ejemplo",
                'created_at' => now()
            ]);
        }

        DB::table('blog_posts')->insert($content);
    }
}
