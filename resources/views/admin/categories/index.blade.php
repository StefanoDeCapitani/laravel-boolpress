@extends('layouts.admin')

@section('title', 'Post | Boolpress')

@section('main-content')
<div class="col-lg-8">
    <div class="d-flex align-items-center mb-4">
        <h2 class="my-auto">Categorie</h2>
        @if(Session::has("message"))
            <div class="alert alert-success ml-auto my-auto">{{ Session::get("message") }}</div>
        @endif
    </div>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Nome</th>
            <th scope="col">Numero di post</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td><a href="{{ route("admin.categories.show", $category->id) }}">
                        {{ $category->name }}
                    </a></td>
                    <td>
                        {{ $category->posts }}
                    </td>
                    <td>
                        <form action="{{ route("admin.categories.destroy", $category->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger" {{ $category->posts !== 0 ? "disabled" : ""}}>Elimina</button> 
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