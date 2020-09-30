@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('posts') }}">Posts</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
            </ol>
        </nav>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">{{ $post->title }}</h1>
                <p>{{$post::getLabel('created_at')}}: <small>{{$post->created_at}}</small></p>
                <p class="lead">
                    {!! $post->content_md !!}
                </p>
            </div>
        </div>
    </div>
@endsection
