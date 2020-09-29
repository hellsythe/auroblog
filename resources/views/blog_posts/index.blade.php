@extends('layouts.app')

@section('content')
<div class="container">
    <table>
        <tr>
            <th>Título</th>
            <th>Vista previa</th>
            <th>Fecha de creación</th>
        </tr>
        @foreach ($posts as $key => $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->preview}}</td>
                <td>{{$post->created_at}}</td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
