<template>
    <header class="py-5 bg-light border-bottom">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">{{ title }}</h1>
                <p class="lead mb-0">{{ subtitle }}</p>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: "TheHeader",
    props: {
        title: {
            type: String,
            default: "Benvenuto sul Blog di Boolean!",
        },
        subtitle: {
            type: String,
            default: "",
        },
    },
};
</script>
