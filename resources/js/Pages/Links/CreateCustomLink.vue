<template>
    <v-button @click="modal = true">Create New Link</v-button>
    <v-dialog-modal max-width="2xl" :show="modal" @close="modal = false">
        <template #title>What link type do you want?</template>
        <template #content>
            <div class="grid grid-cols-2 gap-3">
                <div
                    v-for="type in $page.props.linkTypes"
                    @click="create(type)"
                    class="rounded-xl border border-gray-200 p-4 text-center transition hover:bg-gray-100 cursor-pointer flex items-center justify-between"
                >
                    <span>{{ type }}</span>
                    <img :src="require('../../../img/link-types/' + type.toLowerCase() + '.svg').default" class="h-5"  alt=""/>
                </div>
            </div>
        </template>
    </v-dialog-modal>
</template>

<script>
    import VButton from "@/Components/Button";
    import VDialogModal from "@/Components/DialogModal";
    import VDialogForm from "@/Components/DialogForm";
    import VSecondaryButton from "@/Components/SecondaryButton";

    export default {
        components: {VSecondaryButton, VDialogForm, VDialogModal, VButton},
        data() {
            return {
                modal: false,
                form: this.$inertia.form({
                    type: "",
                }),
            };
        },
        methods: {
            create(type) {
                this.form.type = type;
                this.form.post(route("links.create"), {
                    onSuccess: () => (this.modal = false),
                });
            },
        },
    };
</script>
