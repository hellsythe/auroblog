<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogPost;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = BlogPost::orderBy('created_at');
        if ($request->title) {
            $posts->where('title', 'like', "%{$request->input('title')}%");
        }
        /**
         * order era un parametro en la query donde pensaba hacer la ordenacion personalizada ejemplo
         * order = tilte+ = seria ordenar por titulo de mayor a menor
         * order = tilte = seria ordenar por titulo de menor a mayor
         * para que el admistrador pudiera ordenar sin limitaciones, pero por el tiempo ya no lo termine de implementar
         */
        $posts = $posts->paginate($request->input('elements')??10)->appends(request()->only(['page','elements', 'title', 'order']));;

        return view('admin.blog_posts.index',[
            'posts' => $posts,
            'request' => $request->input(),
            'attributes' => BlogPost::ATTRIBUTES
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog_posts.create',[
            'post' => new BlogPost(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->loadData(new BlogPost(), $request)->save();
        return redirect()->route('blog-posts.index')->with('message', 'Blog Guardado Correctamente');;
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
        return view('admin.blog_posts.show', [
            'post' => BlogPost::where('slug', $slug)->firstOrFail()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(string $slug)
    {
        return view('admin.blog_posts.edit', [
            'post' => BlogPost::where('slug', $slug)->firstOrFail()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $slug)
    {
        $model = BlogPost::where('slug', $slug)->firstOrFail();
        $model =$this->loadData($model, $request);
        $model->save();
        return redirect()->route('blog-posts.index')->with('message', 'Post Actualizado Correctamente');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $slug)
    {
        $model = BlogPost::where('slug', $slug)->firstOrFail()->delete();
        return redirect()->route('blog-posts.index')->with('message', 'Post Eliminado Correctamente');;
    }

    /**
     * [loadData description]
     * @return [type] [description]
     */
    private function loadData(BlogPost $model, Request $request)
    {
        $request->validate(BlogPost::RULES);
        $model->title = $request->input('title');
        $model->content = $request->input('content');
        return $model;
    }
}
