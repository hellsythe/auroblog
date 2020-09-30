<?php

use Illuminate\Database\Seeder;
use App\Models\BlogPost;

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

        $model = new BlogPost();
        $model->title = "Post markdown Ejemplo";
        $model->content = '```javascript
var s = "JavaScript syntax highlighting";
alert(s);
```

```php
$variable = "95";
echo $variable;
```';
        $model->save();

        DB::table('blog_posts')->insert($content);
    }
}
