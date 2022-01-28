<template>
    <div class="min-height-100">
        <navbar />
        <router-view class="flex-grow-1"></router-view>
        <the-footer />
    </div>
</template>

<script>
import Navbar from "./partials/Navbar.vue";
import TheFooter from "./partials/TheFooter.vue";

export default {
    name: "App",
    components: {
        Navbar,
        TheFooter,
    },
};
</script>

<style lang="scss" scoped>
.min-height-100 {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}
</style>
