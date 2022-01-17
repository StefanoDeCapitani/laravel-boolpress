<template>
    <div class="blog-posts">
        <!-- Featured blog post-->
        <div class="card mb-4">
            <a href="#!">
                <img
                    class="card-img-top"
                    :src="postsArray[0].coverImg"
                    :alt="postsArray[0].title"
                />
            </a>
            <div class="card-body">
                <div class="small text-muted">
                    {{ postsArray[0].author }}
                </div>
                <h2 class="card-title h4">{{ postsArray[0].title }}</h2>
                <p class="card-text">
                    <span
                        v-html="
                            postsArray[0].content.slice(0, 200).trim() + '...'
                        "
                    >
                    </span>
                </p>
                <a class="btn btn-primary" href="#">Read more →</a>
            </div>
        </div>
        <!-- Nested row for non-featured blog posts-->

        <div class="row">
            <div
                class="col-lg-6"
                v-for="post in headlessPostsArray"
                :key="post.id"
            >
                <!-- Blog post-->
                <div class="card mb-4">
                    <a href="#!"
                        ><img
                            class="card-img-top"
                            :src="post.coverImg"
                            :alt="post.title"
                    /></a>
                    <div class="card-body">
                        <div class="small text-muted">
                            {{ post.author }}
                        </div>
                        <h2 class="card-title h4">{{ post.title }}</h2>
                        <p class="card-text">
                            <span
                                v-html="
                                    post.content.slice(0, 80).trim() + '...'
                                "
                            >
                            </span>
                        </p>
                        <a class="btn btn-primary" href="#">Read more →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "BlogPosts",
    props: {
        posts: Array,
    },
    data() {
        return {
            postsArray: null,
        };
    },
    computed: {
        headlessPostsArray() {
            return this.postsArray.slice(1);
        },
    },
    watch: {
        posts: function (val) {
            this.postsArray = val;
        },
    },
};
</script>
