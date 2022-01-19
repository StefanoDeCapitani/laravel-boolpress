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
                    <side-bar />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Navbar from "./Navbar";
import SideBar from "./SideBar";
import BlogPosts from "./BlogPosts.vue";
import BlogHeader from "./BlogHeader.vue";

export default {
    name: "BlogPage",
    components: {
        SideBar,
        BlogPosts,
        BlogHeader,
        Navbar,
    },
    data() {
        return {
            posts: null,
        };
    },
    mounted() {
        axios.get("http://127.0.0.1:8000/api/posts").then((resp) => {
            console.log(resp.data.data);
            this.posts = resp.data.data;
        });
    },
};
</script>
