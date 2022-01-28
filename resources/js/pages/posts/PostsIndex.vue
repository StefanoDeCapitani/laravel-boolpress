<template>
    <div class="h-100 position-relative">
        <div v-if="isLoading" class="spinner-container">
            <div class="m-auto">
                <div class="p-5 mt-5">
                    <div
                        class="spinner-border"
                        style="width: 3rem; height: 3rem"
                        role="status"
                    >
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                Loading content
            </div>
        </div>

        <the-header
            :title="
                category
                    ? 'Categoria: ' + posts[0].category.name
                    : 'Benvenuto sul blog di Boolean'
            "
        />
        <div class="container mt-5">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <blog-posts :posts="posts" />
                    <div class="d-flex justify-content-center py-4">
                        <pagination :meta="meta" @change-page="onChangePage" />
                    </div>
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
    props: ["category"],
    data() {
        return {
            isLoading: false,
            posts: null,
            meta: null,
            categories: null,
            tags: null,
            postCategory: null,
        };
    },
    methods: {
        onChangePage(page) {
            this.fetchPosts(page);
        },
        onCategoryFilter(e) {
            fetchPost();
        },
        fetchPosts(page) {
            this.isLoading = true;
            let category = this.postCategory;
            axios
                .get("http://127.0.0.1:8000/api/guest/posts", {
                    params: category ? { page, category } : { page },
                })
                .then((resp) => {
                    this.isLoading = false;
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
        axios.get("http://127.0.0.1:8000/api/guest/tags").then((resp) => {
            this.tags = resp.data.data;
        });
    },
    watch: {
        category: function (val) {
            this.postCategory = val;
            this.fetchPosts(1);
        },
    },
};
</script>

<style lang="scss" scoped>
.spinner-container {
    height: 95vh;
    background-color: white;
    position: absolute;
    inset: 0;
    display: flex;
    z-index: 3;
}
</style>
