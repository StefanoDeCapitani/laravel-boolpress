@extends('layouts.admin')

@section("title", "Crea nuovo post | Boolpress")

@section('main-content')
<div class="col-lg-8">
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
            <label for="coverImg" class="form-label">URL immagine</label>
            <input type="text" class="form-control @error("coverImg") is-invalid @enderror" 
            id="coverImg" name="coverImg" value="{{ old('coverImg')}}">
            @error("coverImg") 
                <div class="invalid-feedback">{{ $message }}</div> 
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoria</label>
            <select name="category_id" class="form-control" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ ($category->id == old("category_id")) ? "selected" : ""}}>
                        {{ $category->name }}
                    </option>  
                @endforeach
            </select>
            @error("category") 
                <div class="invalid-feedback">{{ $message }}</div> 
            @enderror
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <select name="tags[]" class="form-control" id="category_id" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" {{ (old("tags") && in_array($tag->id, old("tags"))) ? "selected" : ""}}>
                        {{ $tag->name }}
                    </option>  
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary mb-3 mt-3">Crea</button>
        <a class="btn btn-secondary mb-3 mt-3" href="{{ URL::previous() }}">Indietro</a>
    </form>
</div>
<div class="col-lg-4">
    @include("admin.partials.sidebar")
</div>
@endsection

@section("body-additional-scripts")
    @include("admin.partials.text_editor_scripts")
@endsection