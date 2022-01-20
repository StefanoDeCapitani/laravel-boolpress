@extends('layouts.admin')

@section('main-content')
<div class="col-lg-8">
    <div class="d-flex align-items-center">
        <h2 class="mb-4">Profilo</h2>
        @if(Session::has("message"))
            <div class="alert alert-success ml-auto my-auto">{{ Session::get("message") }}</div>
        @endif
    </div>
    <div class="card mb-4">
        <a href="#" class="d-flex justify-content-center p-5">
            <div class="w-25">
                <img class="card-img-top w-100" src="{{ $user->image }}" alt="{{ $user->title }}" />
            </div>
        </a>
        <div class="card-body">
            <h2>Utente: {{ $user->name }}</h2>
            <h5>Ruolo: {{ $user->role }}</h5>
            <p>Email: {{ $user->email }}</p>
            <p class="card-text">Data iscrizione: {{ $user->created_at }}</p>
            <div class="d-flex">
                @if($user->id === Auth::id())
                    <a class="btn btn-primary mr-3" href="{{ route("admin.users.edit", $user->id) }}">Modifica</a>
                @endif
                <form action="{{ route("admin.users.destroy", $user->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger">Elimina</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection