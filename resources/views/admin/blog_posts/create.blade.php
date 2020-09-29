@extends('layouts.app')

@section('content')
<div class="container">
    @breadcrumb([
        'blog-posts.index' => 'Posts',
        '#' => 'Nuevo Post'
    ])
    <form class="" action="{{ route('blog-posts.store') }}" method="post">
        @include('admin.blog_posts._form')
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
