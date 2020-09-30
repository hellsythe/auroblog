<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\BlogPost;

class BlogPostTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testMarkdown()
    {
        $post = new BlogPost();
        $post->title = 'Unit test Markdown';
        $post->content = '
# This is an <h1> tag
## This is an <h2> tag
###### This is an <h6> tag

* Item 1
* Item 2
* Item 2a
* Item 2b';
        $post->save();

        $this->assertTrue($post->content_md != '');
    }
}
