<template>
    <div>
        <div class="container mt-5">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <blog-post-show :blogpost="post" />
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <side-bar :categories="categories" :tags="tags" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BlogPostShow from "./partials/BlogPostShow.vue";
import SideBar from "../../components/SideBar.vue";

export default {
    name: "PostsShow",
    components: {
        BlogPostShow,
        SideBar,
    },
    data() {
        return {
            post: null,
            categories: null,
            tags: null,
        };
    },
    created() {
        let url =
            "http://127.0.0.1:8000/api/guest/posts/" + this.$route.params.slug;
        axios.get(url).then((resp) => {
            this.post = resp.data.data;
        });
        axios.get("http://127.0.0.1:8000/api/guest/categories").then((resp) => {
            this.categories = resp.data.data;
        });
        axios.get("http://127.0.0.1:8000/api/guest/tags").then((resp) => {
            this.tags = resp.data.data;
        });
    },
};
</script>
