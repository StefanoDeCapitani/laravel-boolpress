@extends('layouts.admin')

@section('title', 'Blog | Boolpress')

@section('main-content')
<div class="col">
    <div class="d-flex px-3 mb-4">
        <h2 class="my-auto mr-3">Elenco post</h2>
        <a class="btn btn-primary mb-2 mt-2" href="{{ route("admin.posts.create") }}">Crea nuovo Post</a>
        @if(Session::has("message"))
        <div class="alert alert-danger ml-auto my-auto">{{ Session::get("message") }}</div>
        @endif
    </div>

    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Post</th>
            <th scope="col">Titolo</th>
            <th scope="col">Autore</th>
            <th scope="col">Categoria</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th>{{ $post->id }}</th>
                    <th scope="row"><img class="thumbnail" src="{{ asset($post->coverImg) }}"
                        alt="{{ $post->title }}" /></th>
                    <td><a href="{{ route("admin.posts.show", $post->slug) }}">{{ $post->title }}</a></td>
                    <td>
                        <a href="{{ route("admin.users.show", $post->user->id) }}">{{ $post->user->name}}</a>
                    </td>
                    <td><a href="{{ route("admin.categories.show", $post->category->id) }}">{{ $post->category->name }}</a></td>
                    <td>
                        @if(Auth::id() === $post->user->id)
                        <a class="btn btn-primary" href="{{ route("admin.posts.edit",  $post->slug) }}">Modifica</a>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route("admin.posts.destroy", $post->slug) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger">Elimina</button> 
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Pagination-->
    {!! $posts->links() !!}
</div>
@endsection
