<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item" :class="{ disabled: !hasPrev }">
                <button
                    class="page-link"
                    :disabled="!hasPrev"
                    @click="changePageOnClick(curPage - 1)"
                >
                    Precedente
                </button>
            </li>
            <li
                class="page-item"
                v-for="page of totPages"
                :key="page"
                :class="{ active: isCurrentPage(page) }"
            >
                <button class="page-link" @click="changePageOnClick(page)">
                    {{ page }}
                </button>
            </li>
            <li class="page-item" :class="{ disabled: !hasNext }">
                <button
                    class="page-link"
                    :disabled="!hasNext"
                    @click="changePageOnClick(curPage + 1)"
                >
                    Successivo
                </button>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "Pagination",
    props: {
        meta: Object,
    },
    data() {
        return {
            pagMeta: null,
        };
    },
    computed: {
        hasPrev() {
            return this.curPage !== 1;
        },
        hasNext() {
            return this.curPage < this.totPages;
        },
        curPage() {
            return this.pagMeta ? this.pagMeta.current_page : null;
        },
        totPages() {
            return this.pagMeta ? this.pagMeta.last_page : null;
        },
    },
    methods: {
        changePageOnClick(page) {
            this.$emit("change-page", page);
        },
        isCurrentPage(page) {
            return this.curPage === page;
        },
    },
    watch: {
        meta: function (val) {
            this.pagMeta = val;
        },
    },
};
</script>

<style></style>
