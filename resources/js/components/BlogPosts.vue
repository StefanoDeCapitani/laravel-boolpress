<template>
    <div class="blog-posts">
        <!-- Featured blog post-->
        <div class="card mb-4">
            <a href="#!">
                <img
                    class="card-img-top"
                    :src="featuredPost ? featuredPost.coverImg : ''"
                    :alt="featuredPost ? featuredPost.title : ''"
                />
            </a>
            <div class="card-body">
                <div class="small text-muted">
                    {{ featuredPost ? featuredPost.user.name : "" }}
                </div>
                <h2 class="card-title h4">
                    {{ featuredPost ? featuredPost.title : "" }}
                </h2>
                <p class="card-text">
                    <span v-html="featuredPost ? featuredPost.content : ''">
                    </span>
                </p>
                <a class="btn btn-primary" href="#">Read more →</a>
            </div>
        </div>
        <!-- Nested row for non-featured blog posts-->

        <div class="row">
            <div
                class="col-lg-6"
                v-for="post in nonFeaturedPosts"
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
                            {{ post.user.name }}
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
        featuredPost() {
            return this.postsArray ? this.postsArray[0] : null;
        },
        nonFeaturedPosts() {
            return this.postsArray ? this.postsArray.slice(1) : [];
        },
    },
    mounted() {
        this.postsArray = this.posts;
    },
    watch: {
        posts: function (val) {
            this.postsArray = val;
        },
    },
};
</script>
