@extends('layouts.app')

@section('content')
<div class="container">
    @breadcrumb(['#' => 'Lista de posts'])

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="form-group">
        <a href="{{ route('blog-posts.create') }}" class="btn btn-success">Nuevo Post</a>
    </div>
    <div class="form-group">
        <button type="button" name="button" class="btn btn-primary show" data-target=".advanced-search">Búsqueda Avanzada</button>
        <br><br>
        <div class="advanced-search d-none">
            <form class="row" action="{{ route('blog-posts.index') }}" method="get">
                <div class="col-md-4">
                    <label for="title">Título</label>
                    <input type="text" name="title" value="{{$request['title']??''}}" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="title">Elementos por Página</label>
                    <select class="form-control" name="elements">
                        @php
                            $request['elements'] = $request['elements']??0;
                        @endphp
                        <option value="" {{0==$request['elements']?'selected':''}}>Selecciona una opción</option>
                        <option value="5" {{5==$request['elements']?'selected':''}} >5 por página</option>
                        <option value="10" {{10==$request['elements']?'selected':''}} >10 por página</option>
                        <option value="20" {{20==$request['elements']?'selected':''}} >20 por página</option>
                    </select>
                </div>
                <input type="hidden" name="page" value="">
                <input type="hidden" name="order" value="">
                <div class="col-md-12 text-right">
                    <a href="{{ route('blog-posts.index') }}" class="btn btn-warning">Limpiar</a>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
    </div>

    <table class="table">
        <tr>
            <th>{{$attributes['title']}}</th>
            <th>{{$attributes['preview']}}</th>
            <th>{{$attributes['created_at']}}</th>
            <th></th>
        </tr>
        @foreach ($posts as $key => $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->preview}}</td>
                <td>{{$post->created_at}}</td>
                <td>
                    <div class="form-group">
                        <form class="question" data-question="¿Estás seguro de eliminar este Post?" action="{{ route('blog-posts.destroy', $post->slug) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            <a href="{{ route('blog-posts.edit', $post->slug) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                            <a href="{{ route('blog-posts.show', $post->slug) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $posts->links() }}
</div>
@endsection
