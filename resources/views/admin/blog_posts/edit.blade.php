@extends('layouts.app')

@section('content')
<div class="container">
    @breadcrumb([
        'blog-posts.index' => 'Posts',
        '#' => 'Editar Post'
    ])
    <form class="" action="{{ route('blog-posts.update', $post->slug) }}" method="post">
        @method('PUT')
        @include('admin.blog_posts._form')
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
