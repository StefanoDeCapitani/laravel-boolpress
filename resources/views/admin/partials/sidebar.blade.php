<!-- Search widget-->
<div class="card mb-4">
    <div class="card-header">Search</div>
    <div class="card-body">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
            <button class="btn btn-primary" id="button-search" type="button">Go!</button>
        </div>
    </div>
</div>
<!-- Categories widget-->
<div class="card mb-4">
    <div class="card-header">Categorie</div>
    <div class="card-body">
        <div class="row">
            @foreach($categories as $category)
                @if($loop->index % 3 === 0)
                <div class="col-sm-6">
                    <ul class="list-unstyled mb-0">
                @endif
                        <li><a href="{{ route("admin.categories.show", $category->id) }}">{{ $category->name }}</a></li>
                @if(($loop->index + 1) % 3 === 0 || $loop->last)
                    </ul>
                </div>
                @endif   
            @endforeach
        </div>
        @if(Auth::user()->role === "admin")
            <form action="{{ route("admin.categories.store") }}" method="POST" class="d-flex pt-2">
                @csrf
                <label for="name"></label>
                <input type="text" class="form-control" name="name" id="name" />
                <button class="btn btn-primary ml-1">Crea</button>
            </form>
        @endif
    </div>
</div>
<!-- Side widget-->
<div class="card mb-4">
    <div class="card-header">Tags</div>
    <div class="card-body">
        @for ($i = 0; $i < count($tags) && $i < 6; $i++)
            <a href="#" class="badge {{ $tags[$i]->style }} p-2 m-1">{{ $tags[$i]->name }}</a>
        @endfor
        <a href="#" class="d-block mt-3 p-1">Vedi tutti...</a>
    </div>
</div>