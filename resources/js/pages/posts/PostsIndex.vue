<template>
    <div>
        <the-header />
        <div class="container mt-5">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <blog-posts :posts="posts" />
                    <div class="d-flex justify-content-center pt-4">
                        <pagination :meta="meta" @change-page="onChangePage" />
                    </div>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <side-bar :categories="categories" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SideBar from "../../components/SideBar.vue";
import BlogPosts from "./partials/BlogPosts.vue";
import TheHeader from "../../components/TheHeader.vue";
import Pagination from "../../components/Pagination.vue";

export default {
    name: "PostsIndex",
    components: {
        SideBar,
        BlogPosts,
        TheHeader,
        Pagination,
    },
    data() {
        return {
            posts: null,
            meta: null,
            categories: null,
        };
    },
    methods: {
        onChangePage(page) {
            this.fetchPosts(page);
        },
        fetchPosts(page) {
            axios
                .get("http://127.0.0.1:8000/api/guest/posts", {
                    params: { page: page },
                })
                .then((resp) => {
                    this.posts = resp.data.data;
                    this.meta = resp.data.meta;
                });
        },
    },
    created() {
        this.fetchPosts(1);
        axios.get("http://127.0.0.1:8000/api/guest/categories").then((resp) => {
            this.categories = resp.data.data;
        });
    },
};
</script>
