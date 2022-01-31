<template>
    <div class="container">
        <div class="alert alert-success my-5" role="alert" v-if="isEmailSent">
            Grazie per averci scritto! Ti risponderemo a breve
        </div>
        <form @submit.prevent="onFormSubmit" v-if="!isEmailSent">
            <h2 class="my-5">Lascia un messaggio</h2>
            <div class="form-group">
                <label for="name">Nome e Cognome</label>
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    v-model="contactForm.name"
                    placeholder="es. Mario Rossi"
                />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    v-model="contactForm.email"
                    placeholder="nome@esempio.it"
                />
            </div>
            <div class="form-group">
                <label for="subject">Oggetto</label>
                <input
                    type="text"
                    class="form-control"
                    v-model="contactForm.subject"
                    name="subject"
                />
            </div>
            <div class="form-group">
                <label for="message">Messaggio</label>
                <textarea
                    class="form-control"
                    id="message"
                    v-model="contactForm.message"
                    rows="5"
                ></textarea>
            </div>
            <button class="btn btn-primary">Invia</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "ContactForm",
    data() {
        return {
            isEmailSent: false,
            contactForm: {
                name: "",
                email: "",
                subject: "",
                message: "",
            },
        };
    },
    methods: {
        onFormSubmit() {
            axios
                .post(
                    "http://localhost:8000/api/guest/contact/send",
                    this.contactForm
                )
                .then((resp) => {
                    this.isEmailSent = true;
                });
        },
    },
};
</script>

<style></style>
