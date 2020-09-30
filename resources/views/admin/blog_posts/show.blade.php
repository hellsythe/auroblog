@extends('layouts.app')

@section('content')
<div class="container">
    @breadcrumb([
        'blog-posts.index' => 'Posts',
        '#' => 'Ver'
    ])
    <div class="form-group">
        <a href="{{route('blog-posts.edit', $post->slug)}}" class="btn btn-primary">Editar</a>
    </div>
    <table class="table">
        <tr>
            <th>{{$post::getLabel('title')}}</th>
            <td>{{$post->title}}</td>
        </tr>
        <tr>
            <th>{{$post::getLabel('content')}}</th>
            <td>
                {!!$post->content!!}
            </td>
        </tr>
        <tr>
            <th>{{$post::getLabel('content_md')}}</th>
            <td>
                <highlight-component>
                    {!!$post->content_md!!}
                </highlight-component>
            </td>
        </tr>
        <tr>
            <th>{{$post::getLabel('preview')}}</th>
            <td>{!!$post->preview!!}</td>
        </tr>
        <tr>
            <th>{{$post::getLabel('created_at')}}</th>
            <td>{{$post->created_at}}</td>
        </tr>
    </table>
</div>
@endsection
