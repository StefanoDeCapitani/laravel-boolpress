<template>
    <div>
        <navbar />
        <router-view></router-view>
        <the-footer />
    </div>
</template>

<script>
import Navbar from "./Navbar.vue";
import TheFooter from "./TheFooter.vue";

export default {
    name: "App",
    components: {
        Navbar,
        TheFooter,
    },
};
</script>
