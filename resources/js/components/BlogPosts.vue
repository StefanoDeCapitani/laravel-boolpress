<template>
    <div class="blog-posts">
        <!-- Featured blog post-->
        <div class="card mb-4">
            <a href="#"
                ><img class="card-img-top" src="coverImg" alt="title"
            /></a>
            <div class="card-body">
                <div class="small text-muted">Autore</div>
                <h2 class="card-title">Titolo</h2>
                <p class="card-text">Sottotitolo</p>
                <a class="btn btn-primary" href="#">Read more →</a>
            </div>
        </div>
        <!-- Nested row for non-featured blog posts-->

        <div class="row">
            <!-- @foreach ($posts as $post) @if ($loop->index != 0) -->
            <div class="col-lg-6">
                <!-- Blog post-->
                <div class="card mb-4">
                    <a href="#!"
                        ><img class="card-img-top" src="coverImg" alt="title"
                    /></a>
                    <div class="card-body">
                        <div class="small text-muted">Autore</div>
                        <h2 class="card-title h4">Titolo</h2>
                        <p class="card-text">Sottotitolo</p>
                        <a class="btn btn-primary" href="#">Read more →</a>
                    </div>
                </div>
            </div>
            <!--  @endif @endforeach -->
        </div>
    </div>
</template>

<script>
export default {
    name: "BlogPosts",
};
</script>
