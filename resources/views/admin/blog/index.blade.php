@extends('layouts.admin')
@section('title', 'Bool-Boolean')

@section('header')
    @include('partials.header')
@endsection

@section('main-content')
    <div class="row d-flex px-3 mb-4">
        <a class="btn btn-primary mb-2 mt-2" href="{{ route("admin.posts.create") }}">Crea nuovo Post</a>
        @if(Session::has("message"))
        <div class="alert alert-danger ml-auto my-auto">{{ Session::get("message") }}</div>
        @endif
    </div>
    <!-- Featured blog post-->
    <div class="card mb-4">
        <a href="#"><img class="card-img-top" src="{{ $posts[0]->coverImg }}" alt="{{ $posts[0]->title }}" /></a>
        <div class="card-body">
            <div class="small text-muted">{{ $posts[0]->author }}</div>
            <h2 class="card-title">{{ $posts[0]->title }}</h2>
            <p class="card-text">{!!  trim(substr($posts[0]->content, 0, 200)) . "..." !!}</p>
            <a class="btn btn-primary" href="{{ route("admin.posts.show", [$posts[0]->id]) }}">Leggi di più →</a>
        </div>
    </div>
    <!-- Nested row for non-featured blog posts-->

    <div class="row">
        @foreach ($posts as $post)
            @if ($loop->index != 0)
                <div class="col-lg-6">
                    <!-- Blog post-->
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="{{ $post->coverImg }}"
                                alt="{{ $post->title }}" /></a>
                        <div class="card-body">
                            <div class="small text-muted">{{ $post->author }}</div>
                            <h2 class="card-title h4">{{ $post->title }}</h2>
                            <p class="card-text">{!! trim(substr($post->content, 0, 100)) . "..." !!}</p>
                            <a class="btn btn-primary" href="{{ route("admin.posts.show", $post->id) }}">Leggi di più →</a>
                        </div>
                    </div>
                </div>
            @endif

        @endforeach

    </div>
    <!-- Pagination-->
    <nav aria-label="Pagination">
        <hr class="my-0" />
        <ul class="pagination justify-content-center my-4">
            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a>
            </li>
            <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
            <li class="page-item"><a class="page-link" href="#!">2</a></li>
            <li class="page-item"><a class="page-link" href="#!">3</a></li>
            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
            <li class="page-item"><a class="page-link" href="#!">15</a></li>
            <li class="page-item"><a class="page-link" href="#!">Older</a></li>
        </ul>
    </nav>
@endsection
