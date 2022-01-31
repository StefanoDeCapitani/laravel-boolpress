@extends('layouts.admin')
@section('title', 'Bool-Boolean')

@section('main-content')
<div class="col">
    <div class="d-flex px-3 mb-4">
        <h2>Users</h2>
        @if(Session::has("message"))
        <div class="alert alert-danger">{{ Session::get("message") }}</div>
        @endif
    </div>

    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Immagine</th> 
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Data di registrazione</th>
            <th scope="col">Ruolo</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td><img class="thumbnail" src="{{ asset("storage/" . $user->image) }}" alt=""></td>
                    <th scope="row"><a href="{{ route("admin.users.show", $user->id) }}">{{ $user->name }}</a></th>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <form action="{{ route("admin.users.update", $user->id) }}" method="POST" class="d-flex" disabled>
                            @csrf
                            @method("PUT")
                            <input type="hidden" name="name" value="{{$user->name}}"/>
                            <input type="hidden" name="email" value="{{$user->email}}"/>
                            <select name="role" class="form-control mr-2" {{ $user->id === Auth::id() ? "disabled" : "" }}>
                                <option value="user" {{ $user->role === "user" ? "selected" : ""  }}>Utente</option> 
                                <option value="admin" {{ $user->role === "admin" ? "selected" : ""  }}>Amministratore</option>   
                            </select>
                            <button class="btn btn-primary" {{ $user->id === Auth::id() ? "disabled" : "" }}>Salva</button>
                            
                        </form>
                    </td>
                    <td class="d-flex">
                        
                        <form action="{{ route("admin.users.destroy", $user->id) }}" method="POST">
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
