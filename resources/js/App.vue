<template>
    <div>
        <navbar />
        <router-view></router-view>
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
