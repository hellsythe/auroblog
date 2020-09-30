@extends('layouts.app')

@section('content')
<div class="container">
    {{ $posts->links() }}
    <div class="row row-cols-1 row-cols-md-3">
        @foreach ($posts as $key => $post)
            <div class="col mb-4">
                <div class="card h-100">
                    <img src="{{asset('blog.jpeg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->preview}}</p>
                        <p>{{$post::getLabel('created_at')}}: <small>{{$post->created_at}}</small> </p>
                        <a href="{{route('post', $post->slug)}}" class="btn btn-primary">Detalles</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
