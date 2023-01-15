<template>
    <v-button :full="true" @click="create"> Create a Button</v-button>
</template>

<script>
    import VButton from "@/Components/Button";
    import VDialogModal from "@/Components/DialogModal";
    import VDialogForm from "@/Components/DialogForm";
    import VSecondaryButton from "@/Components/SecondaryButton";

    export default {
        components: { VSecondaryButton, VDialogForm, VDialogModal, VButton },
        data() {
            return {
                form: this.$inertia.form({
                    type: 'button'
                }),
            };
        },
        methods: {
            create() {
                this.form.post(route("links.create"), {
                    onSuccess: () => (this.modal = false),
                });
            },
        },
    };
</script>
