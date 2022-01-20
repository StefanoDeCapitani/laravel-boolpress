@extends('layouts.admin')

@section('title', 'Categoria di post | Boolpress')

@section('main-content')
<div class="col-lg-8">
    <div class="d-flex align-items-center mb-4">
        <form action="{{ route("admin.categories.update", $category->id) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group d-flex my-auto">
                <label for="name">Categoria:</label>
                <input type="text" class="form-control ml-3 mr-2" name="name" id="name" value="{{ $category->name }}" />
                <button class="btn btn-primary mr-1">Modifica</button>
            </div>
        </form>
        @if(count($posts) === 0)
        <form action="{{ route("admin.categories.destroy", $category->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <button class="btn btn-danger mb-4 mr-2">Elimina</button>
        </form>
        @endif
        @if(Session::has("message"))
            <div class="alert alert-success ml-auto my-auto">{{ Session::get("message") }}</div>
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
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <th scope="row"><img class="thumbnail" src="{{ $post->coverImg }}"
                        alt="{{ $post->title }}" /></th>
                    <td><a href="{{ route("admin.posts.show", $post->id) }}">{{ $post->title }}</a></td>
                    <td>
                        <a href="{{ route("admin.users.show", $post->user->id) }}">{{ $post->user->name}}</a>
                    </td>
                    <td>{{ $post->category->name }}</td>
                    <td>
                        <form action="{{ route("admin.posts.destroy", $post->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger">Elimina</button> 
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <div class="col-lg-4">
        @include("admin.partials.sidebar")
    </div>
@endsection