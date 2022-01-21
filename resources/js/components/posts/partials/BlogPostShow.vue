<template>
    <div>
        <router-link class="btn btn-secondary mb-4" to="/posts">
            Torna all'elenco
        </router-link>
        <div class="card mb-4">
            <a href="#"
                ><img
                    class="card-img-top"
                    :src="post ? post.coverImg : ''"
                    :alt="post ? post.title : ''"
            /></a>
            <div class="card-body">
                <div class="small text-muted">
                    Di {{ post ? post.user.name : "" }}, categoria
                    {{ post ? post.category.name : "" }}
                </div>
                <h2>{{ post ? post.title : "" }}</h2>
                <h5 class="mb-4">{{ post ? post.subtitle : "" }}</h5>
                <p class="card-text" v-html="post ? post.content : ''"></p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "BlogPostShow",
    props: {
        blogpost: Object,
    },
    data() {
        return {
            post: null,
        };
    },
    mounted() {
        this.post = this.blogpost;
    },
    watch: {
        blogpost: function (val) {
            console.log("Ehi!");
            this.post = val;
        },
    },
};
</script>
