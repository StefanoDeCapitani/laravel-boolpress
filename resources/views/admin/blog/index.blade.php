@extends('layouts.admin')
@section('title', 'Bool-Boolean')

@section('main-content')
<div class="col">
    <div class="d-flex px-3 mb-4">
        <a class="btn btn-primary mb-2 mt-2" href="{{ route("admin.posts.create") }}">Crea nuovo Post</a>
        @if(Session::has("message"))
        <div class="alert alert-danger ml-auto my-auto">{{ Session::get("message") }}</div>
        @endif
    </div>

    <table class="table table-hover">
        <thead>
          <tr>
            <th></th>
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
                    <th>{{ $loop->iteration }}</th>
                    <th scope="row"><img class="thumbnail" src="{{ $post->coverImg }}"
                        alt="{{ $post->title }}" /></th>
                    <td><a href="{{ route("admin.posts.show", $post->id) }}">{{ $post->title }}</a></td>
                    <td>
                        <a href="{{ route("admin.users.show", $post->user->id) }}">{{ $post->user->name}}</a>
                    </td>
                    <td>{{ $post->category }}</td>
                    <td>
                        @if(Auth::id() === $post->user->id)
                        <a class="btn btn-primary" href="{{ route("admin.posts.edit",  $post->id) }}">Modifica</a>
                        @endif
                    </td>
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
</div>
@endsection
