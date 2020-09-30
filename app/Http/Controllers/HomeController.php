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
        return view('blog_posts.index',[
            'posts' => BlogPost::orderBy('created_at', 'desc')->paginate(10),
            'attributes' => BlogPost::ATTRIBUTES
        ]);
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
