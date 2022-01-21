<template>
    <div class="side-bar">
        <!-- Search widget-->
        <div class="card mb-4">
            <div class="card-header">Search</div>
            <div class="card-body">
                <div class="input-group">
                    <input
                        class="form-control"
                        type="text"
                        placeholder="Enter search term..."
                        aria-label="Enter search term..."
                        aria-describedby="button-search"
                    />
                    <button
                        class="btn btn-primary"
                        id="button-search"
                        type="button"
                    >
                        Go!
                    </button>
                </div>
            </div>
        </div>
        <!-- Categories widget-->
        <div class="card mb-4">
            <div class="card-header">Categories</div>
            <div class="card-body">
                <div class="row">
                    <div
                        class="col-sm-6"
                        v-for="(column, i) in categoryColumns"
                        :key="i"
                    >
                        <ul class="list-unstyled mb-0">
                            <li v-for="category in column" :key="category.id">
                                <a href="#!">
                                    {{ category ? category.name : "" }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Side widget-->
        <div class="card mb-4">
            <div class="card-header">Tags</div>
            <div class="card-body">
                <a
                    v-for="(tag, i) in sixTags"
                    :key="i"
                    href="#"
                    class="badge p-2 m-1"
                    :class="tag ? tag.style : ''"
                >
                    {{ tag ? tag.name : "" }}
                </a>
                <a href="#" class="d-block mt-3 p-1">Vedi tutti...</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SideBar",
    props: {
        categories: Array,
        tags: Array,
    },
    data() {
        return {
            categoriesArray: null,
            tagsArray: null,
        };
    },
    computed: {
        sixTags() {
            return this.tagsArray ? this.tagsArray.slice(0, 6) : null;
        },
        categoryColumns() {
            if (this.categoriesArray) {
                let columns = [[], []];
                for (let i = 0; i < this.categoriesArray.length; i++) {
                    if (i % 2 === 0) {
                        columns[0].push(this.categoriesArray[i]);
                    }
                    if (i % 2 !== 0) {
                        columns[1].push(this.categoriesArray[i]);
                    }
                }
                return columns;
            }
            return null;
        },
    },
    mounted() {
        this.categoriesArray = this.categories;
        this.tagsArray = this.tags;
    },
    watch: {
        categories: function (val) {
            this.categoriesArray = val;
        },
        tags: function (val) {
            this.tagsArray = val;
        },
    },
};
</script>
