<template>
    <the-header :title="title" :subtitle="subtitle" />
</template>

<script>
import TheHeader from "./TheHeader.vue";

export default {
    name: "Home",
    components: {
        TheHeader,
    },
    data() {
        return {
            title: "Homepage!",
            subtitle: 'Clicca su "Blog" per leggere i nuovi post',
        };
    },
};
</script>
