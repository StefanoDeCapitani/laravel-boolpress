<template>
    <div>
        <navbar />
        <blog-header />
        <div class="container mt-5">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <blog-posts :posts="posts" />
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <side-bar :categories="categories" />
                </div>
            </div>
        </div>
        <the-footer />
    </div>
</template>

<script>
import Navbar from "./Navbar";
import SideBar from "./SideBar";
import BlogPosts from "./BlogPosts.vue";
import BlogHeader from "./BlogHeader.vue";
import TheFooter from "./TheFooter.vue";

export default {
    name: "BlogPage",
    components: {
        SideBar,
        BlogPosts,
        BlogHeader,
        Navbar,
        TheFooter,
    },
    data() {
        return {
            posts: null,
            categories: null,
        };
    },
    created() {
        axios.get("http://127.0.0.1:8000/api/guest/posts").then((resp) => {
            this.posts = resp.data.data;
        });
        axios.get("http://127.0.0.1:8000/api/guest/categories").then((resp) => {
            this.categories = resp.data.data;
        });
    },
};
</script>
