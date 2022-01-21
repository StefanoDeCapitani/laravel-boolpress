@extends('layouts.admin')

@section('title', 'Post | Boolpress')

@section('main-content')
    <div class="col-lg-8">
        <div class="d-flex align-items-center">
            <a class="btn btn-secondary mb-3 mt-3" href="{{ route("admin.posts.index") }}">Torna all'elenco</a>
            @if(Session::has("message"))
            <div class="alert alert-success ml-auto my-auto">{{ Session::get("message") }}</div>
            @endif
        </div>
        <div class="card mb-4">
            <a href="#"><img class="card-img-top" src="{{ $post->coverImg }}" alt="{{ $post->title }}" /></a>
            <div class="card-body">
                <div class="small text-muted">
                    Di 
                        <a href="{{ route("admin.users.show", $post->user->id) }}">
                            {{ $post->user->name }}
                        </a>
                    , categoria 
                        <a href="{{ route("admin.categories.show", $post->category->id) }}"> 
                            {{ $post->category->name }}
                        </a>
                </div>
                <h2>{{ $post->title }}</h2>
                <h5>{{ $post->subtitle }}</h5>
                <p class="card-text">{!! $post->content !!}</p>
                <div class="d-flex">
                    @if(Auth::id() === $post->user->id)
                        <a class="btn btn-primary mr-3" href="{{ route("admin.posts.edit", $post->id) }}">Modifica</a>
                    @endif
                    <form action="{{ route("admin.posts.destroy", $post->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        @include("admin.partials.sidebar")
    </div>
@endsection