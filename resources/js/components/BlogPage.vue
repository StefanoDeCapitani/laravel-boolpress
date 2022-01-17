<template>
    <div>
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <blog-posts />
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
import SideBar from "./SideBar";
import BlogPosts from "./BlogPosts.vue";

export default {
    name: "BlogPage",
    components: {
        SideBar,
        BlogPosts,
    },
};
</script>
