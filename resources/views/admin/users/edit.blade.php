@extends('layouts.admin')

@section('main-content')
<div class="col-lg-8">
    <form action="{{ route("admin.users.update", $user->id) }}" method="POST" enctype='multipart/form-data' class="mb-5">
        @csrf
        @method('PUT')
        <label for="image" class="form-label">Immagine di copertina</label>
        <div class="input-group mb-3">
            <div class="custom-file @error("image") is-invalid @enderror">
              <input type="file" class="custom-file-input" id="image" name="image" 
              value="{{ old('image') ?? $user->image }}">
              <label class="custom-file-label" for="image">Scegli un'immagine</label>
            </div>
            @error("image") 
                <div class="invalid-feedback">{{ $message }}</div> 
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error("name") is-invalid @enderror" 
            id="name" name="name" value="{{ old('name') ?? $user->name }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 text-editor">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control  @error("email") is-invalid @enderror" 
            id="email" name="email" value="{{ old('email') ?? $user->email }}">
            @error("email") 
                <div class="invalid-feedback">{{ $message }}</div> 
            @enderror
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Ruolo</label>
            <select name="role" class="form-control" @error("role") is-invalid @enderror 
            {{ (Auth::user()->role === "user" ||  Auth::id() === $user->id) ? "disabled" : "" }}>
                <option value="user" {{ $user->role === "user" ? "selected" : ""  }}>Utente</option> 
                <option value="admin" {{ $user->role === "admin" ? "selected" : ""  }}>Amministratore</option>   
            </select>
            @error("role") 
                <div class="invalid-feedback">{{ $message }}</div> 
            @enderror
        </div>
        <button class="btn btn-primary mb-3 mt-3">Salva</button>
        <a class="btn btn-secondary mb-3 mt-3" href="{{ URL::previous() }}">Indietro</a>
    </form>
</div>
@endsection
