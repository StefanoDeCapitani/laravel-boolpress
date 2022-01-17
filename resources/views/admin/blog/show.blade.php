@extends('layouts.admin')

@section('main-content')
    <div class="card mb-4">
        <a href="#"><img class="card-img-top" src="{{ $post->coverImg }}" alt="{{ $post->title }}" /></a>
        <div class="card-body">
            <div class="small text-muted">Di {{ $post->author }}</div>
            <h2>{{ $post->title }}</h2>
            <h5>{{ $post->subtitle }}</h5>
            <p class="card-text">{!! $post->content !!}</p>
            <div class="d-flex">
                <a class="btn btn-primary mr-3" href="{{ route("admin.posts.edit", $post->id) }}">Modifica</a>
                <form action="{{ route("admin.posts.destroy", $post->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger">Elimina</button>
                </form>
            </div>
        </div>
    </div>
@endsection