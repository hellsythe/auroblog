<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class HomeController extends Controller
{
    /**
     * Display a post list for clients
     * @return \Illuminate\Http\Response
     */
    public function blogPosts()
    {
        dd(BlogPost::all());
    }

    /**
     * Display a one post for clients
     * @return \Illuminate\Http\Response
     */
    public function blogPost($slug)
    {
        return view('blog_posts.details', [
            'post' => BlogPost::where('slug', $slug)->firstOrFail()
        ]);
    }

}
