@extends('layouts.admin')

@section("title", "Crea nuovo post")

@section('main-content')
    <form action="{{ route("admin.posts.store") }}" method="POST" class="mb-5">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error("title") is-invalid @enderror" 
            id="title" name="title" value="{{ old('title')}}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="subtitle" class="form-label">Sottotitolo</label>
            <input type="text" class="form-control @error("subtitle") is-invalid @enderror"  
            id="subtitle" name="subtitle" value="{{ old('subtitle')}}">
            @error("subtitle") 
                <div class="invalid-feedback">{{ $message }}</div> 
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control @error("content") is-invalid @enderror" 
            id="content" name="content" rows="6">
                {{ old('content') }}
            </textarea>
            @error("content") 
                <div class="invalid-feedback">{{ $message }}</div> 
            @enderror
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Autore</label>
            <input type="text" class="form-control @error("author") is-invalid @enderror" 
            id="author" name="author" value="{{ old('author')}}">
            @error("author") 
                <div class="invalid-feedback">{{ $message }}</div> 
            @enderror
        </div>
        <div class="mb-3">
            <label for="coverImg" class="form-label">URL immagine</label>
            <input type="text" class="form-control @error("coverImg") is-invalid @enderror" 
            id="coverImg" name="coverImg" value="{{ old('coverImg')}}">
            @error("coverImg") 
                <div class="invalid-feedback">{{ $message }}</div> 
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <input type="text" class="form-control @error("category") is-invalid @enderror" 
            id="category" name="category" value="{{ old('category')}}">
            @error("category") 
                <div class="invalid-feedback">{{ $message }}</div> 
            @enderror
        </div>
        <button class="btn btn-primary mb-3 mt-3">Crea</button>
        <a class="btn btn-secondary mb-3 mt-3" href="{{ URL::previous() }}">Indietro</a>
    </form>

    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
@endsection