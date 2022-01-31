<template>
    <div>
        <the-header :title="title" :subtitle="subtitle" />
        <contact-form />
    </div>
</template>

<script>
import TheHeader from "../components/TheHeader.vue";
import ContactForm from "../components/ContactForm.vue";

export default {
    name: "Home",
    components: {
        TheHeader,
        ContactForm,
    },
    data() {
        return {
            title: "Homepage!",
            subtitle: 'Clicca su "Blog" per leggere i nuovi post',
        };
    },
};
</script>
